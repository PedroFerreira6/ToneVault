<?php

class WalletController
{

    public function index()
    {
        if (isset($_SESSION['user_id'])) {
            require_once 'app/models/UserModel.php';
            $userModel = new UserModel();
            $saldo = $userModel->userSaldo($_SESSION['user_id']);

            
            require_once './app/views/walletView.php';
        } else {
            header("location:/");
        }
    }
}
