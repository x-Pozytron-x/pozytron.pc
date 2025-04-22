<?php
error_log('Request URI: ' . $_SERVER['REQUEST_URI']);
error_log('Request Method: ' . $_SERVER['REQUEST_METHOD']);

header('Content-Type: application/json');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// Подключение к БД
function getDB() {
  try {
    $db = new PDO('mysql:host=localhost;dbname=db_pozytron', 'root', '123');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
  } catch (PDOException $e) {
    error_log('Database connection failed: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed']);
    exit;
  }
}

// Получение JSON данных из тела запроса
function getJsonBody() {
  $rawData = file_get_contents('php://input');
  error_log('Raw request body: ' . $rawData);
  $data = json_decode($rawData, true);
  if ($data === null) {
    error_log('Failed to decode JSON: ' . json_last_error_msg());
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Invalid JSON']);
    exit;
  }
  return $data;
}

// Роутинг
switch ("$method $uri") {
  case 'POST /index.php/api/login':
  case 'POST /api/login':
    $data = getJsonBody();
    if (empty($data['username']) || empty($data['password'])) {
      http_response_code(400);
      echo json_encode(['success' => false, 'error' => 'Username and password are required']);
      exit;
    }

    require_once '../controllers/AuthController.php';
    $controller = new AuthController(getDB());
    $response = $controller->login($data);
    echo json_encode($response);
    break;

  case 'GET /index.php/api/validate-token':
  case 'GET /api/validate-token':
    error_log('Handling validate-token request');
    $token = isset($_SERVER['HTTP_AUTHORIZATION']) ? $_SERVER['HTTP_AUTHORIZATION'] : '';
    error_log('Received token: ' . $token);
    if ($token && strpos($token, 'Bearer ') === 0) {
      $token = substr($token, 7);
      error_log('Token after Bearer: ' . $token);
      echo json_encode(['valid' => true]); // Можно заменить на проверку в БД
    } else {
      echo json_encode(['valid' => false]);
    }
    break;

  case 'POST /index.php/api/save_data':
  case 'POST /api/save_data':
    require_once '../controllers/SaveController.php';
    SaveController::save_data(getDB()); // Передаём подключение к БД
    break;

  case 'POST /index.php/api/get_data':
  case 'POST /api/get_data':
    require_once '../controllers/GetController.php';
    GetController::get_data(getDB());
    break;

  default:
    http_response_code(404);
    echo json_encode(['error' => 'Route not found']);
    break;
}
