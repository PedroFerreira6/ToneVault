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

    public function getUserById($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM utilizadores WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function updateUser($id, $name, $email, $saldo, $nivel)
    {
        $stmt = $this->db->prepare('UPDATE utilizadores SET nome = ?, email = ?, saldo = ?, nivel = ? WHERE id = ?');
        return $stmt->execute([$name, $email, $saldo, $nivel, $id]);
    }


    public function getUserLevel($userId) {
        $query = "SELECT nivel FROM utilizadores WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['nivel'];
    }

}