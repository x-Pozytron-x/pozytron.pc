<?PHP

  function get_data($query, $params = array()) {
    global $db;
    $stmt = $db->getConnection()->prepare($query);
    $stmt->execute($params);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($result) {
      return $result;
    } else {
      return false;
    }
  }
  function save_data($tbl, $data, $return = false) {
    global $db;
    $columns = implode(", ", array_keys($data));
    $placeholders = implode(", ", array_fill(0, count($data), '?'));
    $sql = "INSERT INTO $tbl ($columns) VALUES ($placeholders)";
    $stmt = $db->getConnection()->prepare($sql);
    $stmt->execute(array_values($data));
    if ($return) {
        return $db->getConnection()->lastInsertId();
    } else {
        return $stmt;
    }
}

  function delete_data($query, $params = array()) {
    global $db;
    $stmt = $db->getConnection()->prepare($query);
    $stmt->execute($params);
    return $stmt->rowCount();
  }

  function update_data($tbl, $data, $conditions) {
    global $db;
    $set_part = [];
    foreach ($data as $key => $value) {
      $set_part[] = "$key = :$key";
    }
    $set_string = implode(", ", $set_part);
    $condition_part = [];
    foreach ($conditions as $key => $value) {
      $condition_part[] = "$key = :cond_$key";
    }
    $condition_string = implode(" AND ", $condition_part);
    $sql = "UPDATE $tbl SET $set_string WHERE $condition_string";
    $params = [];
    foreach ($data as $key => $value) {
      $params[":$key"] = $value;
    }
    foreach ($conditions as $key => $value) {
      $params[":cond_$key"] = $value;
    }
    $stmt = $db->getConnection()->prepare($sql);
    $stmt->execute($params);
    return $stmt->rowCount();
  }

// Вычисляет разницу между двумя датами (годами и месяцами) в формате YYYY.MM
  function calculate_date_difference($start_date, $end_date) {
    list($start_year, $start_month) = explode('.', $start_date);
    list($end_year, $end_month) = explode('.', $end_date);

    $start_year = (int)$start_year;
    $start_month = (int)$start_month;
    $end_year = (int)$end_year;
    $end_month = (int)$end_month;

    $total_start_months = $start_year * 12 + $start_month;
    $total_end_months = $end_year * 12 + $end_month;

    $month_difference = $total_end_months - $total_start_months;

    $years = floor($month_difference / 12);
    $months = $month_difference % 12;

    return $years . ' years ' . $months . ' months';
}