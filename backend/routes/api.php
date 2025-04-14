<?php
error_log('Request URI: ' . $_SERVER['REQUEST_URI']);
error_log('Request Method: ' . $_SERVER['REQUEST_METHOD']);

header('Content-Type: application/json');

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$uri = parse_url($uri, PHP_URL_PATH);

if ($method === 'POST' && ($uri === '/index.php/api/login' || $uri === '/api/login')) {
  $rawData = file_get_contents('php://input');
  error_log('Raw request body: ' . $rawData);

  $data = json_decode($rawData, true);
  if ($data === null) {
    error_log('Failed to decode JSON: ' . json_last_error_msg());
    http_response_code(400);
    echo json_encode(array('success' => false, 'error' => 'Invalid JSON'));
    exit;
  }

  if (empty($data['username']) || empty($data['password'])) {
    http_response_code(400);
    echo json_encode(array('success' => false, 'error' => 'Username and password are required'));
    exit;
  }

  error_log('Received data: ' . print_r($data, true));

  require_once '../controllers/AuthController.php';
  $db = null;
  try {
    $db = new PDO('mysql:host=localhost;dbname=db_pozytron', 'root', '123');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    error_log('Database connection failed: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(array('error' => 'Database connection failed'));
    exit;
  }

  $controller = new AuthController($db);
  $response = $controller->login($data);
  echo json_encode($response);
} elseif ($method === 'GET' && ($uri === '/index.php/api/validate-token' || $uri === '/api/validate-token')) {
  error_log('Handling validate-token request');
  $token = isset($_SERVER['HTTP_AUTHORIZATION']) ? $_SERVER['HTTP_AUTHORIZATION'] : '';
  error_log('Received token: ' . $token);
  if ($token && strpos($token, 'Bearer ') === 0) {
    $token = substr($token, 7); // Убираем "Bearer "
    // Здесь можно добавить проверку токена в БД
    error_log('Token after Bearer: ' . $token);
    echo json_encode(array('valid' => true));
  } else {
    echo json_encode(array('valid' => false));
  }
} else {
  http_response_code(404);
  echo json_encode(array('error' => 'Route not found'));
}