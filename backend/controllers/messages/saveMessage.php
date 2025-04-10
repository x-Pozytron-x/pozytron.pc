<?php
require_once __DIR__ . '/../../config/database.php';

// Получаем JSON-данные из тела запроса
$data = json_decode(file_get_contents("php://input"), true);

// Простейшая валидация
$name = trim(isset($data['name']) ? $data['name'] : '');
$email = trim(isset($data['email']) ? $data['email'] : '');
$message = trim(isset($data['message']) ? $data['message'] : '');


if (!$name || !$email || !$message) {
  http_response_code(400);
  echo json_encode(['error' => 'Все поля обязательны']);
  exit;
}

try {
  $stmt = $pdo->prepare("INSERT INTO messages (name, email, message, created_at) VALUES (?, ?, ?, NOW())");
  $stmt->execute([$name, $email, $message]);

  http_response_code(201);
  echo json_encode(['success' => true]);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['error' => 'Ошибка сохранения сообщения']);
}
