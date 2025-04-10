<?php
require_once __DIR__ . '/../../config/database.php';

try {
  $stmt = $pdo->query("SELECT id, title, description, url, image_url, created_at FROM projects ORDER BY created_at DESC");
  $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

  header('Content-Type: application/json');
  echo json_encode($projects);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(['error' => 'Ошибка получения проектов']);
}
