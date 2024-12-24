<?php

class UploadController
{
    public function index()
    {
        if (isset($_SESSION['user_id'])) {
            require_once './app/views/uploadView.php';
        } else {
            header("location:/");
        }
    }

    public function processUpload()
    {
        $userId = $_SESSION['user_id'];

        if (isset($_FILES['myfile']['name']) && $_FILES['myfile']['name'] !== '') {
            $file = $_FILES['myfile'];
            $originalFileName = $file['name'];
            $fileTmpPath = $file['tmp_name'];
            $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);

            if (strtolower($fileExtension) !== 'mp3') {
                echo "Apenas ficheiros MP3 são permitidos.";
                return;
            }

            $encryptedFileName = md5($originalFileName . time()) . '.mp3';
            $uploadPath = 'downloads/' . $encryptedFileName;

            if (move_uploaded_file($fileTmpPath, $uploadPath)) {
                require_once 'app/models/AudioModel.php';
                $audioModel = new AudioModel();

                // Dados recebidos do formulário
                $titulo = htmlspecialchars($_POST['title'] ?? 'Sem Título', ENT_QUOTES, 'UTF-8');
                $descricao = htmlspecialchars($_POST['description'] ?? 'Sem Descrição', ENT_QUOTES, 'UTF-8');
                $valor = filter_var($_POST['price'], FILTER_VALIDATE_INT, ["options" => ["min_range" => 0]]) ?? 0;
                $privacidade = filter_var($_POST['privacy'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
                $estado = filter_var($_POST['listing_type'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);

                if ($privacidade === null || $estado === null) {
                    echo "Valores inválidos para privacidade ou tipo de listagem.";
                    return;
                }

                $audioModel->uploadAudio(
                    $titulo,
                    $descricao,
                    $originalFileName,
                    $encryptedFileName,
                    $valor,
                    $userId,
                    $privacidade,
                    $estado
                );

                echo "Ficheiro enviado e registado com sucesso.";
                header("Location:/upload");
            } else {
                echo "Erro ao fazer upload do ficheiro.";
            }
        } else {
            echo "Nenhum ficheiro foi enviado.";
        }
    }
}