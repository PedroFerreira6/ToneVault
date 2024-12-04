<?php

class UserController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            require_once 'models/UserModel.php';
            $userModel = new UserModel();

            $user = $userModel->authenticate($username, $password);

            if ($user) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                header('Location: /dashboard');
                exit();
            } else {
                $error = 'Invalid username or password.';
                require_once 'views/login.php';
            }
        } else {
            require_once 'views/login.php';
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /login');
        exit();
    }
}
