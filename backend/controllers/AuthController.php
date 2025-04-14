<?php
class AuthController {
  private $pdo;

  public function __construct($pdo) {
    $this->pdo = $pdo;
  }

  public function login($data) {
    if (!isset($data['username']) || !isset($data['password'])) {
      error_log('Missing username or password in login data');
      return array('success' => false, 'error' => 'Missing username or password');
    }

    $username = $data['username'];
    $password = $data['password'];

    try {
      $stmt = $this->pdo->prepare('SELECT * FROM users WHERE username = ?');
      $stmt->execute(array($username));
      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($user) {
        error_log('User fetched: ' . print_r($user, true));
        if (password_verify($password, $user['password_hash'])) {
          // Используем openssl_random_pseudo_bytes вместо random_bytes
          $token = bin2hex(openssl_random_pseudo_bytes(16));
          error_log('Login successful for user: ' . $username);
          return array('success' => true, 'token' => $token, 'user_id' => $user['id']);
        } else {
          error_log('Password verification failed for user: ' . $username);
          return array('success' => false, 'error' => 'Invalid credentials');
        }
      } else {
        error_log('User not found: ' . $username);
        return array('success' => false, 'error' => 'Invalid credentials');
      }
    } catch (Exception $e) {
      error_log('Login error: ' . $e->getMessage());
      return array('success' => false, 'error' => 'Server error');
    }
  }
}