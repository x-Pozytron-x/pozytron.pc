<?php

class SaveController
{
  public static function save_data()
  {
    // Подключение к БД
    try {
      $db = new PDO('mysql:host=localhost;dbname=db_pozytron', 'root', '123');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      error_log('DB connection failed: ' . $e->getMessage());
      http_response_code(500);
      echo json_encode(array('success' => false, 'error' => 'Database connection error'));
      return;
    }

    // Чтение и парсинг тела запроса
    $input = json_decode(file_get_contents('php://input'), true);

    if (!$input || !isset($input['table']) || !isset($input['data'])) {
      http_response_code(400);
      echo json_encode(array('success' => false, 'error' => 'Missing table or data'));
      return;
    }

    $table = isset($input['table']) ? $input['table'] : null;
    $data = isset($input['data']) ? $input['data'] : null;

    if ($table !== 'config' || !is_array($data)) {
      http_response_code(400);
      echo json_encode(array('success' => false, 'error' => 'Invalid table or data format'));
      return;
    }

    // Проход по каждой паре name/value
    $stmt = $db->prepare("INSERT INTO config (name, value) VALUES (:name, :value)
                          ON DUPLICATE KEY UPDATE value = :value");

    foreach ($data as $item) {
      if (!isset($item['name']) || !isset($item['value'])) {
        continue;
      }

      try {
        $stmt->execute(array(
          ':name' => $item['name'],
          ':value' => $item['value']
        ));
      } catch (PDOException $e) {
        error_log('DB error: ' . $e->getMessage());
        http_response_code(500);
        echo json_encode(array('success' => false, 'error' => 'Database error'));
        return;
      }
    }

    echo json_encode(array('success' => true));
  }
}
