<?php

// Настройка CORS для API (если React на другом порту/домене)
header("Access-Control-Allow-Origin: *"); //   Можно ограничить до http://localhost:3000
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
  http_response_code(200);
  exit;
}

// Подключение автозагрузки и конфигов
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../routes/api.php';


echo "loool";