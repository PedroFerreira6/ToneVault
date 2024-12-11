<?php

require_once './app/controllers/LoginPageController.php';
class UserController {
    public function login() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            require_once 'app/models/UserModel.php';
            $userModel = new UserModel();

            $user = $userModel->authenticate($email, $password);

            if ($user) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];

                header('Location: /home');
                exit();
            } else {
                $error = 'Invalid email or password.';
                header( 'Location: /login');
            }
        } else {
            header( 'Location: /login');
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /login');
        exit();
    }
}
