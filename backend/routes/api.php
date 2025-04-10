<?php

$requestUri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Удаляем /api из начала пути
$path = preg_replace('/^\/api/', '', $requestUri);

// Простой роутинг
if ($path === '/projects' && $method === 'GET') {
  require_once __DIR__ . '/../controllers/projects/getProjects.php';
} elseif ($path === '/messages' && $method === 'POST') {
  require_once __DIR__ . '/../controllers/messages/saveMessage.php';
} else {
  http_response_code(404);
  echo json_encode(['error' => 'Not Found']);
}
