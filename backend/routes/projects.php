<?php
require_once __DIR__ . '/../models/Project.php';

function handleProjectsRoute($method, $uri) {
  if ($method === 'GET' && $uri === '/api/projects') {
    echo json_encode(Project::getAll());
  } elseif ($method === 'POST' && $uri === '/api/projects') {
    $data = json_decode(file_get_contents('php://input'), true);
    echo json_encode(Project::create($data));
  } elseif ($method === 'PUT' && preg_match('#^/api/projects/(\d+)$#', $uri, $matches)) {
    $id = (int)$matches[1];
    $data = json_decode(file_get_contents('php://input'), true);
    echo json_encode(Project::update($id, $data));
  } elseif ($method === 'DELETE' && preg_match('#^/api/projects/(\d+)$#', $uri, $matches)) {
    $id = (int)$matches[1];
    echo json_encode(Project::delete($id));
  } else {
    http_response_code(405);
    echo json_encode(['error' => 'Invalid request']);
  }
}
