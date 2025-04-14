<?php
//header('Access-Control-Allow-Origin: *'); // Для локальной разработки
header('Access-Control-Allow-Origin: http://localhost:3000');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Обрабатываем предварительный запрос OPTIONS
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
  http_response_code(200);
  exit();
}

// Подключаем маршруты
require_once '../routes/api.php';