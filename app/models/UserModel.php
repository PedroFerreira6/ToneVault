<?php

class UserModel
{
    private $db;

    public function __construct()
    {
        require_once './app/database/Database.php';
        $this->db = Database::getInstance();
    }

    public function authenticate($email, $password)
    {
        $hashedPassword = hash('sha256', $password);

        $stmt = $this->db->prepare('SELECT * FROM utilizadores WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && ($hashedPassword == $user['password'])) {
            return $user;
        }

        return false;
    }

    public function userExists($email)
    {
        $stmt = $this->db->prepare('SELECT id FROM utilizadores WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);

        return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
    }

    public function createUser($name, $email, $password, $saldo, $nivel, $estado)
    {
        $hashedPassword = hash('sha256', $password);

        $stmt = $this->db->prepare('INSERT INTO utilizadores (nome, email, password, saldo, nivel, estado) VALUES (?, ?, ?, ?, ?, ?)');
        return $stmt->execute([$name, $email, $hashedPassword, $saldo, $nivel, $estado]);
    }


    public function getUsers()
    {
        $query = "SELECT * FROM utilizadores ORDER BY id ASC";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM utilizadores WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updatePassword($id, $newPassword)
{
    $hashedPassword = hash('sha256', $newPassword);
    $stmt = $this->db->prepare('UPDATE utilizadores SET password = ? WHERE id = ?');
    return $stmt->execute([$hashedPassword, $id]);
} 

    public function updateUser($id, $name, $email, $saldo, $nivel)
    {
        $stmt = $this->db->prepare('UPDATE utilizadores SET nome = ?, email = ?, saldo = ?, nivel = ? WHERE id = ?');
        return $stmt->execute([$name, $email, $saldo, $nivel, $id]);
    }


    public function getUserLevel($userId)
    {
        $query = "SELECT nivel FROM utilizadores WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['nivel'];
    }

    public function updateUserState($userId, $newState)
    {
        $sql = "UPDATE utilizadores SET estado = :estado WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['estado' => $newState, 'id' => $userId]);
    }

    public function userSaldo($userId)
    {
        $sql = "SELECT saldo FROM utilizadores WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $userId]);
        return $stmt->fetchColumn();
    }

    public function getComprasByUserId($userId)
    {
        $query = "
        SELECT 
            c.id AS compra_id,
            c.valor AS valor_compra,
            a.id AS audio_id,
            a.titulo AS titulo_audio,
            u.nome AS nome_dono_audio
        FROM 
            compras c
        JOIN 
            audios a ON c.idAudio = a.id
        JOIN 
            utilizadores u ON a.idUtilizador = u.id
        WHERE 
            c.idUtilizador = :userId
        ORDER BY
        c.id DESC
    ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTransacoesByUserId($userId)
    {
        $query = "
        SELECT 
            t.id AS transacao_id,
            t.valor AS valor_transacao,
            a.id AS audio_id,
            a.titulo AS titulo_audio,
            u.nome AS nome_antigo_dono
        FROM 
            transacoesaudios t
        JOIN 
            audios a ON t.idAudio = a.id
        JOIN 
            utilizadores u ON t.idUtilizadorOut = u.id
        WHERE 
            t.idUtilizadorIn = :userId
        ORDER BY
        t.id DESC
    ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getGanhosDeComprasByUserId($userId)
    {
        $query = "
        SELECT 
            c.id AS compra_id,
            c.valor AS valor_compra,
            a.id AS audio_id,
            a.titulo AS titulo_audio,
            u.nome AS nome_comprador
        FROM 
            compras c
        JOIN 
            audios a ON c.idAudio = a.id
        JOIN 
            utilizadores u ON c.idUtilizador = u.id
        WHERE 
            a.idUtilizador = :userId
        ORDER BY
        c.id DESC
    ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getGanhosDeTransacoesByUserId($userId)
    {
        $query = "
        SELECT 
            t.id AS transacao_id,
            t.valor AS valor_transacao,
            a.id AS audio_id,
            a.titulo AS titulo_audio,
            u.nome AS nome_comprador
        FROM 
            transacoesaudios t
        JOIN 
            audios a ON t.idAudio = a.id
        JOIN 
            utilizadores u ON t.idUtilizadorIn = u.id
        WHERE 
            t.idUtilizadorOut = :userId
        ORDER BY
        t.id DESC
    ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
