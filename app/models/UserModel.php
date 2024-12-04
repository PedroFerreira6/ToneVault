<?php

class UserModel {
    private $db;

    public function __construct() {
        require_once 'Database.php';
        $this->db = Database::getInstance();
    }

    public function authenticate($username, $password) {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE username = ? LIMIT 1');
        $stmt->execute([$username]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password_hash'])) {
            return $user; 
        }

        return false; 
    }
}
