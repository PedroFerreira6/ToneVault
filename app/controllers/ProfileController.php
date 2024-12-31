<?php
require_once 'app/models/UserModel.php';
require_once 'app/models/AudioModel.php';
class ProfileController
{
    public function index()
    {
       if (isset($_SESSION['user_id'])) {
        
            
            $userId = $_SESSION['user_id'];
            if(isset($_GET['id']) && is_numeric($_GET['id'])){
                $userModel = new UserModel();
                $userData = $userModel->getUserById($_GET['id']);
                $audioModel = new AudioModel();
                $audioData = $audioModel->listAudiosByUser($_GET['id']);
                require_once './app/views/profileView.php';
                
            }else{

                $userModel = new UserModel();
                $userData = $userModel->getUserById($userId);
                $audioModel = new AudioModel();
                $audioData = $audioModel->listMyAudios($userId);
                require_once './app/views/profileView.php';
                
                
            }
    

            
       } else {
           header("location:/");
       }
    }


}