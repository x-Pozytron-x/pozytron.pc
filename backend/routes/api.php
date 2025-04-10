<?php
error_log('Request URI: ' . $_SERVER['REQUEST_URI']); // Для отладки

// Упрощаем проверку маршрута
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Убираем параметры запроса (например, ?test=1)
$uri = parse_url($uri, PHP_URL_PATH);

if ($method === 'POST' && ($uri === '/index.php/api/login' || $uri === '/api/login')) {
  require_once '../controllers/AuthController.php';
  $db = new PDO('mysql:host=localhost;dbname=db_pozytron', 'root', '123');
  $controller = new AuthController($db);
  $controller->login();
} else {
  http_response_code(404);
  echo json_encode(['error' => 'Route not found']);
}