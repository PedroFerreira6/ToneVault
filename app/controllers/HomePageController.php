<?php

class HomePageController
{

    public function index()
    {
        if (isset($_SESSION['user_id'])) {
            require_once 'app/models/AudioModel.php';
            $audioModel = new AudioModel();
            $audiosList = $audioModel->listAudios();
            $audiosByLikes = $audioModel->getAudiosByLikes();
            $audiosByViews = $audioModel->getAudiosByViews();
            $audiosBySales = $audioModel->getAudiosBySales();
            $audiosByTransfers = $audioModel->getAudiosByTransfers();
            
            require_once './app/views/homeView.php';
        } else {
            header("location:/");
        }
    }
}
