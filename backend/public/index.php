<?php
header('Access-Control-Allow-Origin: http://localhost:3000');
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header("Access-Control-Allow-Credentials: true"); // если ты работаешь с куками


// Обрабатываем preflight-запрос
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
  http_response_code(200);
  exit;
}

// Подключаем маршруты
require_once '../routes/api.php';