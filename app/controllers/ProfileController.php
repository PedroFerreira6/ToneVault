<?php

class ProfileController
{
    public function index()
    {
       if (!isset($_SESSION['user_id'])) {
            session_start();
            require_once './app/views/profileView.php';
            $userId = $_SESSION['user_id'];

            $userModel = new UserModel();
            $userData = $userModel->getUserById($userId);
            
       } else {
           header("location:/");
       }
    }


}