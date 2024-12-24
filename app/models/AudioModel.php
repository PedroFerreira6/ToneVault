<?php

class AudioModel
{
    private $db;

    public function __construct()
    {
        require_once './app/database/Database.php';
        $this->db = Database::getInstance();
    }

    public function uploadAudio($titulo, $descricao, $ficheiroOriginal, $ficheiroEncriptado, $valor, $idUtilizador, $privacidade, $estado)
    {
        $stmt = $this->db->prepare(
            'INSERT INTO audios (titulo, descricao, ficheiro, ficheiroEnc, valor, idUtilizador, privacidade, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)'
        );
        return $stmt->execute([
            $titulo,
            $descricao,
            $ficheiroOriginal,
            $ficheiroEncriptado,
            $valor,
            $idUtilizador,
            $privacidade,
            $estado
        ]);
    }

    public function getAudioById($id)
    {
        $stmt = $this->db->prepare('SELECT a.id,u.id as idUtilizador,a.titulo,a.descricao,a.ficheiro,a.ficheiroEnc,a.valor,a.estado,u.nome FROM audios a JOIN utilizadores u ON a.idUtilizador=u.id WHERE a.id = ? and privacidade=1 LIMIT 1;');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listAudiosByUser($idUtilizador)
    {
        $stmt = $this->db->prepare('SELECT * FROM audios WHERE idUtilizador = ?');
        $stmt->execute([$idUtilizador]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listAudios()
    {
        $stmt = $this->db->prepare('SELECT a.id,a.titulo,a.descricao,a.ficheiro,a.ficheiroEnc,a.valor,a.estado,u.nome FROM audios a JOIN utilizadores u ON a.idUtilizador=u.id WHERE privacidade=1 ORDER BY a.id DESC;');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function checkPurchase($id)
{
    $user_id = $_SESSION['user_id'];
    $stmt = $this->db->prepare("SELECT CASE WHEN EXISTS (SELECT 1 FROM compras WHERE idUtilizador = ?) AND EXISTS (SELECT 1 FROM compras WHERE idAudio = ?) THEN 'true' 
    ELSE 'false' END AS result;");
    $stmt->execute([$user_id, $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

}
