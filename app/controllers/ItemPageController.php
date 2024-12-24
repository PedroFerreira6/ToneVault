<?php
class ItemPageController
{

    public function index()
    {
        if (isset($_SESSION['user_id'])) {
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                require_once 'app/models/AudioModel.php';
                $audioModel = new AudioModel();
                $audio = $audioModel->getAudioById($_GET['id']);
                $check = $audioModel->checkPurchase($_GET['id']);
                if (empty($audio)) {
                    header("location:/home");
                } else {
                    require_once './app/views/itemView.php';
                }
            } else {
                header("location:/home");
            }
        } else {
            header("location:/home");
        }
    }
}
