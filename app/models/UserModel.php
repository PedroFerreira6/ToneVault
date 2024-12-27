<?php

class UserModel {
    private $db;

    public function __construct() {
        require_once './app/database/Database.php';
        $this->db = Database::getInstance();
    }

    public function authenticate($email, $password) {
        $hashedPassword = hash('sha256', $password);

        $stmt = $this->db->prepare('SELECT * FROM utilizadores WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && ($hashedPassword == $user['password'])) {
            return $user; 
        }

        return false; 
    }

    public function userExists($email) {
        $stmt = $this->db->prepare('SELECT id FROM utilizadores WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);

        return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
    }

    public function createUser($name, $email, $password, $saldo, $nivel, $estado) {
        $hashedPassword = hash('sha256', $password);

        $stmt = $this->db->prepare('INSERT INTO utilizadores (nome, email, password, saldo, nivel, estado) VALUES (?, ?, ?, ?, ?, ?)');
        return $stmt->execute([$name, $email, $hashedPassword, $saldo, $nivel, $estado]);
    }


    public function getUsers() {
        $query = "SELECT * FROM utilizadores";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}