<?php
require_once 'app/models/AudioModel.php';
class ItemPageController
{


    public function index()
    {
        if (isset($_SESSION['user_id'])) {
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $audioModel = new AudioModel();
                $audio = $audioModel->getAudioById($_GET['id']);
                $check = $audioModel->checkPurchase($_GET['id']);
                $transactionList = $audioModel->getTransactionListByAudioId($_GET['id']);
                $checkLike = $audioModel->checkLike($_GET['id'], $_SESSION['user_id']);
                if (empty($audio)) {
                    header("location:/home");
                } else {
                    if ($audio['privacidade'] == 1) {
                        $audioModel->addView($_GET['id'], $_SESSION['user_id']);
                        require_once './app/views/itemView.php';
                    } else {
                        if ($audio['idUtilizador'] == $_SESSION['user_id']) {
                            require_once './app/views/itemView.php';
                        } else {
                            header("location:/");
                        }
                    }
                }
            } else {
                header("location:/home");
            }
        } else {
            header("location:/home");
        }
    }


    public function edit()
    {
        if (isset($_SESSION['user_id'])) {
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $audioModel = new AudioModel();

                $titulo = htmlspecialchars($_POST['title'] ?? 'Sem Título', ENT_QUOTES, 'UTF-8');
                $descricao = htmlspecialchars($_POST['description'] ?? 'Sem Descrição', ENT_QUOTES, 'UTF-8');
                $valor = filter_var($_POST['price'], FILTER_VALIDATE_INT, ["options" => ["min_range" => 0]]) ?? 0;
                $privacidade = filter_var($_POST['privacy'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
                $estado = filter_var($_POST['listing_type'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);

                if ($privacidade === null || $estado === null) {
                    echo "Valores inválidos para privacidade ou tipo de listagem.";
                    return;
                }

                $audioModel->editarAudio(
                    $_GET['id'],
                    $titulo,
                    $descricao,
                    $valor,
                    $_SESSION['user_id'],
                    $privacidade,
                    $estado
                );

                echo "Ficheiro enviado e registado com sucesso.";
                header("Location:/item?id={$_GET['id']}");
            }
        }
    }

    public function buy()
    {
        if (isset($_POST['id']) && isset($_SESSION['user_id'])) {
            if (is_numeric($_POST['id'])) {
                $audioModel = new AudioModel();
                $result = $audioModel->buyAudio($_POST['id'], $_SESSION['user_id']);
                if ($result == "") {
                    header("Location:/item?id={$_POST['id']}");
                } else {
                    echo "<script>
                        alert('$result');
                        setTimeout(function() {
                            window.location.href = '/item?id={$_POST['id']}';
                        }, 1);
                      </script>";
                }
            } else {
                echo "<script>
                alert('The paramters are not True!');
                setTimeout(function() {
                    window.location.href = '/home';
                }, 1); 
              </script>";
            }
        } else {
            echo "<script>
                alert('No paramters to work!!');
                setTimeout(function() {
                    window.location.href = '/home';
                }, 1);
              </script>";
        }
    }
    public function like()
    {
        if (isset($_POST['id']) && isset($_SESSION['user_id'])) {
            if (is_numeric($_POST['id'])) {
                $audioModel = new AudioModel();
                $result = $audioModel->likeAudio($_POST['id'], $_SESSION['user_id']);
                if ($result != "true") {
                    echo "<script>
                        alert('$result');
                        setTimeout(function() {
                            window.location.href = '/item?id={$_POST['id']}';
                        }, 1);
                      </script>";
                } else {
                    header("Location:/item?id={$_POST['id']}");
                }
            } else {
                echo "<script>
                alert('The paramters are not True!');
                setTimeout(function() {
                    window.location.href = '/home';
                }, 1);
              </script>";
            }
        } else {
            echo "<script>
                alert('No paramters to work!!');
                setTimeout(function() {
                    window.location.href = '/home';
                }, 1);
              </script>";
        }
    }
}
