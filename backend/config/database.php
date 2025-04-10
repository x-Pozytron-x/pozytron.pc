<?php
class Database {
  private static $host = 'localhost';
  private static $db   = 'portfolio_db';
  private static $user = 'root';
  private static $pass = '123';
  private static $charset = 'utf8';

  public static function connect() {
    try {
      $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$db . ";charset=" . self::$charset;
      $pdo = new PDO($dsn, self::$user, self::$pass);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    } catch (PDOException $e) {
      http_response_code(500);
      echo json_encode(['error' => 'Database connection failed: ' . $e->getMessage()]);
      exit;
    }
  }
}
