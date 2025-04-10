<?php
class AuthController {
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  public function login() {
    $data = json_decode(file_get_contents('php://input'), true);
    if (empty($data)) {
      $data = $_POST;
      if (empty($data)) {
        $data = $_GET;
      }
    }

    error_log('Received data: ' . print_r($data, true));
        
    $data = is_array($data) ? $data : array();

    $username = isset($data['username']) ? $data['username'] : '';
    $password = isset($data['password']) ? $data['password'] : '';
    try {
      $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
      $stmt->execute([$username]);
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
      error_log('User fetched: ' . print_r($user, true));
    } catch (PDOException $e) {
      error_log('Query failed: ' . $e->getMessage());
      http_response_code(500);
      echo json_encode(['error' => 'Database query failed']);
      return;
    }

    if ($user && password_verify($password, $user['password_hash'])) {
      // Замена random_bytes для PHP 5.6
      $token = bin2hex(openssl_random_pseudo_bytes(16)); // Используем OpenSSL
      header('Content-Type: application/json');
      echo json_encode(['token' => $token]);
    } else {
      http_response_code(401);
      echo json_encode(['error' => 'Неверные данные']);
    }
  }
}