<?php

class GetController
{
  public static function get_data()
  {
    // Получаем JSON тело
    $input = json_decode(file_get_contents('php://input'), true);
    if (!$input || empty($input['table'])) {
      http_response_code(400);
      echo json_encode(array('success' => false, 'error' => 'Missing required parameters'));
      return;
    }

    $table = $input['table'];
    $columns = isset($input['columns']) && is_array($input['columns']) ? $input['columns'] : array('*');
    $where = isset($input['where']) && is_array($input['where']) ? $input['where'] : array();

    // Защита от SQL-инъекций — только буквы, цифры и нижнее подчёркивание
    if (!preg_match('/^[a-zA-Z0-9_]+$/', $table)) {
      http_response_code(400);
      echo json_encode(array('success' => false, 'error' => 'Invalid table name'));
      return;
    }

    try {
      $db = new PDO('mysql:host=localhost;dbname=db_pozytron', 'root', '123');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      error_log('DB connect error: ' . $e->getMessage());
      http_response_code(500);
      echo json_encode(array('success' => false, 'error' => 'DB error'));
      return;
    }

    // Формируем SELECT
    $cols = implode(', ', array_map('trim', $columns));
    $sql = "SELECT {$cols} FROM `{$table}`";
    $params = array();

    if (!empty($where)) {
      $conditions = array();
      foreach ($where as $key => $value) {
        $conditions[] = "`" . $key . "` = :" . $key;
        $params[$key] = $value;
      }
      $sql .= " WHERE " . implode(' AND ', $conditions);
    }

    try {
      $stmt = $db->prepare($sql);
      foreach ($params as $key => $val) {
        $stmt->bindValue(':' . $key, $val);
      }
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      echo json_encode(array('success' => true, 'data' => $results));
    } catch (PDOException $e) {
      error_log('Query error: ' . $e->getMessage());
      http_response_code(500);
      echo json_encode(array('success' => false, 'error' => 'Query failed'));
    }
  }
}
