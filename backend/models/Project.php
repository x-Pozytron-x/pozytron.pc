<?php
require_once __DIR__ . '/../config/database.php';

class Project {
  public static function getAll() {
    $pdo = Database::connect();
    $stmt = $pdo->query('SELECT * FROM projects');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function create($data) {
    $pdo = Database::connect();
    $stmt = $pdo->prepare('INSERT INTO projects (title, description) VALUES (?, ?)');
    $stmt->execute([$data['title'], $data['description']]);
    return ['status' => 'created'];
  }

  public static function update($id, $data) {
    $pdo = Database::connect();
    $stmt = $pdo->prepare('UPDATE projects SET title = ?, description = ? WHERE id = ?');
    $stmt->execute([$data['title'], $data['description'], $id]);
    return ['status' => 'updated'];
  }

  public static function delete($id) {
    $pdo = Database::connect();
    $stmt = $pdo->prepare('DELETE FROM projects WHERE id = ?');
    $stmt->execute([$id]);
    return ['status' => 'deleted'];
  }
}
