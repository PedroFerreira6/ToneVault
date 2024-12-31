<?php

class WalletController
{

    public function index()
    {
        if (isset($_SESSION['user_id'])) {
            require_once 'app/models/UserModel.php';
            $userModel = new UserModel();
            $saldo = $userModel->userSaldo($_SESSION['user_id']);
            $compras = $userModel->getComprasByUserId($_SESSION['user_id']);
            $transacoes = $userModel->getTransacoesByUserId($_SESSION['user_id']);
            $ganhosCompras = $userModel->getGanhosDeComprasByUserId($_SESSION['user_id']);
            $ganhosTransacoes = $userModel->getGanhosDeTransacoesByUserId($_SESSION['user_id']);
            
            require_once './app/views/walletView.php';
        } else {
            header("location:/");
        }
    }
}
