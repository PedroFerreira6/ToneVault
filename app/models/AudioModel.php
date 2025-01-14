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
        $stmt = $this->db->prepare('SELECT a.id,u.id as idUtilizador,a.titulo,a.descricao,a.ficheiro,a.ficheiroEnc,a.valor,a.estado,u.nome,a.privacidade FROM audios a JOIN utilizadores u ON a.idUtilizador=u.id WHERE a.id = ? LIMIT 1;');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listAudiosByUser($idUtilizador)
    {
        $stmt = $this->db->prepare('SELECT * FROM audios WHERE idUtilizador = ? AND privacidade=1 ORDER BY id');
        $stmt->execute([$idUtilizador]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function listMyAudios($idUtilizador)
    {
        $stmt = $this->db->prepare('SELECT * FROM audios WHERE idUtilizador = ? ORDER BY id');
        $stmt->execute([$idUtilizador]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listAudios()
    {
        $stmt = $this->db->prepare('SELECT a.id,a.titulo,a.descricao,a.ficheiro,a.ficheiroEnc,a.valor,a.estado,u.nome FROM audios a JOIN utilizadores u ON a.idUtilizador=u.id WHERE privacidade=1 ORDER BY a.id DESC LIMIT 6;');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAudiosByLikes()
    {
        $stmt = $this->db->prepare(
            "SELECT a.*, u.nome, COUNT(l.idAudio) AS totalLikes
             FROM audios a
             LEFT JOIN likes l ON a.id = l.idAudio
             LEFT JOIN utilizadores u ON a.idUtilizador = u.id
             WHERE a.privacidade = 1
             GROUP BY a.id
             ORDER BY totalLikes DESC
             LIMIT 6"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAudiosByViews()
    {
        $stmt = $this->db->prepare(
            "SELECT a.*, u.nome, COUNT(v.idAudio) AS totalViews
             FROM audios a
             LEFT JOIN views v ON a.id = v.idAudio
             LEFT JOIN utilizadores u ON a.idUtilizador = u.id
             WHERE a.privacidade = 1
             GROUP BY a.id
             ORDER BY totalViews DESC
             LIMIT 6"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAudiosBySales()
    {
        $stmt = $this->db->prepare(
            "SELECT a.*, u.nome, COUNT(c.idAudio) AS totalSales
             FROM audios a
             LEFT JOIN compras c ON a.id = c.idAudio
             LEFT JOIN utilizadores u ON a.idUtilizador = u.id
             WHERE a.privacidade = 1
             GROUP BY a.id
             ORDER BY totalSales DESC
             LIMIT 6"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAudiosByTransfers()
    {
        $stmt = $this->db->prepare(
            "SELECT a.*, u.nome, COUNT(t.idAudio) AS totalTransfers
             FROM audios a
             LEFT JOIN transacoesaudios t ON a.id = t.idAudio
             LEFT JOIN utilizadores u ON a.idUtilizador = u.id
             WHERE a.privacidade = 1
             GROUP BY a.id
             ORDER BY totalTransfers DESC
             LIMIT 6"
        );
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

    public function editarAudio($id, $titulo, $descricao, $valor, $idUtilizador, $privacidade, $estado)
    {
        $stmt = $this->db->prepare(
            'UPDATE audios 
             SET titulo = ?, 
                 descricao = ?, 
                 valor = ?, 
                 idUtilizador = ?, 
                 privacidade = ?, 
                 estado = ? 
             WHERE id = ? AND idUtilizador = ?'
        );
        return $stmt->execute([
            $titulo,
            $descricao,
            $valor,
            $idUtilizador,
            $privacidade,
            $estado,
            $id,
            $idUtilizador
        ]);
    }

    public function editarAudioAdmin($id, $titulo, $descricao, $valor, $idUtilizador, $privacidade, $estado)
    {
        $stmt = $this->db->prepare(
            'UPDATE audios 
             SET titulo = ?, 
                 descricao = ?, 
                 valor = ?, 
                 idUtilizador = ?, 
                 privacidade = ?, 
                 estado = ? 
             WHERE id = ?'
        );
        return $stmt->execute([
            $titulo,
            $descricao,
            $valor,
            $idUtilizador,
            $privacidade,
            $estado,
            $id
        ]);


        
    }




    public function addView($idAudio, $idUtilizador)
    {
        try {
            $stmt = $this->db->prepare(
                "SELECT 1 
                FROM `views` 
                WHERE `idUtilizador` = ? AND `idAudio` = ?;"
            );
            $stmt->execute([$idUtilizador, $idAudio]);
            if ($stmt->rowCount() === 0) {
                $stmtInsert = $this->db->prepare(
                    "INSERT INTO `views` (`idUtilizador`, `idAudio`) 
                    VALUES (?, ?);"
                );
                $stmtInsert->execute([$idUtilizador, $idAudio]);

                $stmtUpdate = $this->db->prepare(
                    "UPDATE `utilizadores` 
                    SET `saldo` = `saldo` + 50 
                    WHERE `id` = ?;"
                );
                return $stmtUpdate->execute([$idUtilizador]);
            }
            return false;
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return false;
        }
    }
    public function buyAudio($idAudio, $idUtilizador)
    {
        try {
            // Iniciar transação
            $this->db->beginTransaction();

            // Verificar se o áudio existe
            $audio = $this->getAudioById($idAudio);
            if (!$audio) {
                return "Error: Audio not found.";
            }

            // Verificar saldo do utilizador
            $stmtSaldo = $this->db->prepare("SELECT saldo FROM utilizadores WHERE id = ?");
            $stmtSaldo->execute([$idUtilizador]);
            $saldo = $stmtSaldo->fetchColumn();

            if ($saldo < $audio['valor']) {
                return "Not enough Toins.";
            }

            if ($audio['privacidade'] == 1) {
                if ($audio['estado'] == 0) {
                    // Compra de áudio SOMENTE OUVIR
                    $stmtCompra = $this->db->prepare(
                        "INSERT INTO compras (valor, idUtilizador, idAudio) VALUES (?, ?, ?)"
                    );
                    if (!$stmtCompra->execute([$audio['valor'], $idUtilizador, $idAudio])) {
                        return  "Error: Failed to register purchase.";
                    }

                    $stmtUpdateSaldo = $this->db->prepare(
                        "UPDATE utilizadores SET saldo = saldo - ? WHERE id = ?"
                    );
                    if (!$stmtUpdateSaldo->execute([$audio['valor'], $idUtilizador])) {
                        return "Not enough Toins";
                    }

                    $this->db->commit();
                    return "Success: Audio purchased.";
                } elseif ($audio['estado'] == 1) {
                    // Compra de áudio com direitos
                    $stmtTransacao = $this->db->prepare(
                        "INSERT INTO transacoesaudios (valor, idUtilizadorIn, idUtilizadorOut, idAudio) VALUES (?, ?, ?, ?)"
                    );
                    if (!$stmtTransacao->execute([$audio['valor'], $idUtilizador, $audio['idUtilizador'], $idAudio])) {
                        return "Error: Failed to register transaction.";
                    }

                    $stmtUpdateAudio = $this->db->prepare(
                        "UPDATE audios SET idUtilizador = ?, privacidade = 0 WHERE id = ?"
                    );
                    if (!$stmtUpdateAudio->execute([$idUtilizador, $idAudio])) {
                        return "Error: Failed to update audio ownership.";
                    }

                    $stmtUpdateSaldoComprador = $this->db->prepare(
                        "UPDATE utilizadores SET saldo = saldo - ? WHERE id = ?"
                    );
                    if (!$stmtUpdateSaldoComprador->execute([$audio['valor'], $idUtilizador])) {
                        return "Not enough Toins";
                    }

                    $stmtUpdateSaldoVendedor = $this->db->prepare(
                        "UPDATE utilizadores SET saldo = saldo + ? WHERE id = ?"
                    );
                    if (!$stmtUpdateSaldoVendedor->execute([$audio['valor'], $audio['idUtilizador']])) {
                        return "Error: Failed to update seller's balance.";
                    }

                    $this->db->commit();
                    return "Success: Audio Rights purchased.";
                }
            }

            return "Error: Invalid audio privacy settings.";
        } catch (Exception $e) {
            // Reverter mudanças em caso de erro
            $this->db->rollBack();
            return $e->getMessage();
        }
    }



    public function getTransactionListByAudioId($id)
    {
        $stmtTransacao = $this->db->prepare(
            "SELECT t.*, u_in.nome AS nome_utilizador_in, u_out.nome AS nome_utilizador_out FROM transacoesaudios t 
    INNER JOIN utilizadores u_in ON t.idUtilizadorIn = u_in.id INNER JOIN utilizadores u_out ON t.idUtilizadorOut = u_out.id WHERE t.idAudio = ?;"
        );
        $stmtTransacao->execute([$id]);
        return $stmtTransacao->fetchAll(PDO::FETCH_ASSOC);
    }

    public function likeAudio($idAudio, $idUtilizador)
    {
        if ($this->checkLike($idAudio, $idUtilizador)) {
            // Remover o like
            $stmtCheckSaldo = $this->db->prepare(
                "SELECT saldo FROM utilizadores WHERE id = ?"
            );
            $stmtCheckSaldo->execute([$idUtilizador]);
            $saldo = $stmtCheckSaldo->fetchColumn();

            if ($saldo >= 100) {
                $stmtDelete = $this->db->prepare(
                    "DELETE FROM likes WHERE idUtilizador = ? AND idAudio = ?"
                );
                if ($stmtDelete->execute([$idUtilizador, $idAudio])) {
                    $stmtUpdateSaldo = $this->db->prepare(
                        "UPDATE utilizadores SET saldo = saldo - 100 WHERE id = ?"
                    );
                    $result = $stmtUpdateSaldo->execute([$idUtilizador]);
                    return $result;
                }
            } else {
                return "Not enough Toins";
            }
        } else {
            // Adicionar o like
            $stmtInsert = $this->db->prepare(
                "INSERT INTO likes (idUtilizador, idAudio) VALUES (?, ?)"
            );
            if ($stmtInsert->execute([$idUtilizador, $idAudio])) {
                $stmtUpdateSaldo = $this->db->prepare(
                    "UPDATE utilizadores SET saldo = saldo + 100 WHERE id = ?"
                );
                $result = $stmtUpdateSaldo->execute([$idUtilizador]);
                return $result;
            }
        }
        return "Error";
    }


    public function checkLike($idAudio, $idUtilizador)
    {
        $stmtCheck = $this->db->prepare(
            "SELECT 1 FROM likes WHERE idUtilizador = ? AND idAudio = ?"
        );
        $stmtCheck->execute([$idUtilizador, $idAudio]);
        return $stmtCheck->fetch();
    }


    public function listAudiosAdmin()
    {
        $stmt = $this->db->prepare('SELECT * FROM audios ORDER BY id DESC;');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteAudioById($id)
    {
        try {
            $this->db->beginTransaction();

            $stmtCheck = $this->db->prepare("SELECT ficheiroEnc FROM audios WHERE id = ?");
            $stmtCheck->execute([$id]);
            $audio = $stmtCheck->fetch(PDO::FETCH_ASSOC);

            if (!$audio) {
                $this->db->rollBack();
                return false;
            }

            $this->db->prepare("DELETE FROM likes WHERE idAudio = ?")->execute([$id]);
            $this->db->prepare("DELETE FROM views WHERE idAudio = ?")->execute([$id]);
            $this->db->prepare("DELETE FROM compras WHERE idAudio = ?")->execute([$id]);

            $stmtDelete = $this->db->prepare("DELETE FROM audios WHERE id = ?");
            $stmtDelete->execute([$id]);

            $audioFilePath = "downloads/" . $audio['ficheiroEnc'];
            if (file_exists($audioFilePath)) {
                unlink($audioFilePath); // Delete the file
            }

            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollBack();
            error_log("Error deleting audio: " . $e->getMessage());
            return false;
        }
    }

    public function getRecentAudios($limit, $offset)
    {
        $query = "SELECT * FROM audios a INNER JOIN utilizadores u ON a.idUtilizador=u.id where privacidade=1 ORDER BY a.id DESC LIMIT :limit OFFSET :offset  ";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countTotalAudios()
    {
        $query = "SELECT COUNT(*) as total FROM audios";
        $stmt = $this->db->query($query);
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
    public function searchAudios($query, $limit, $offset)
    {
        $searchQuery = "%" . $query . "%";
        $stmt = $this->db->prepare(
            "SELECT * FROM audios a INNER JOIN utilizadores u ON a.idUtilizador=u.id 
        WHERE privacidade = 1 AND (a.titulo LIKE :query OR a.descricao LIKE :query) 
        ORDER BY a.id DESC LIMIT :limit OFFSET :offset"
        );
        $stmt->bindValue(':query', $searchQuery, PDO::PARAM_STR);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countSearchResults($query)
    {
        $searchQuery = "%" . $query . "%";
        $stmt = $this->db->prepare(
            "SELECT COUNT(*) as total FROM audios 
        WHERE privacidade = 1 AND (titulo LIKE :query OR descricao LIKE :query)"
        );
        $stmt->bindValue(':query', $searchQuery, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
}
