<?php

class UserModel {
    private $db;

    public function __construct() {
        require_once './app/database/Database.php';
        $this->db = Database::getInstance();
    }

    public function authenticate($email, $password) {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password_hash'])) {
            return $user; 
        }

        return false; 
    }
}
