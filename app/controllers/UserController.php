<?php

require_once './app/controllers/LoginPageController.php';

class UserController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            require_once 'app/models/UserModel.php';
            $userModel = new UserModel();

            $user = $userModel->authenticate($email, $password);

            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['nivel'] = $user['nivel'];

                header('Location: /home');
                exit();
            } else {
                $error = 'Invalid email or password.';
                header('Location: /login');
            }
        } else {
            header('Location: /login');
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /login');
        exit();
    }

    public function signup()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['nome'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
            $saldo = 0;
            $nivel = 1;
            $estado = 1;


            require_once 'app/models/UserModel.php';
            $userModel = new UserModel();



            if (isset($name) && isset($email) && isset($password) && isset($cpassword)) {
                if (empty($name) && empty($email) && empty($password) && empty($cpassword)) {
                    $error = 'Invalida data.';
                    header('Location: /signup');
                    exit();
                }
            }

            if (!isset($name) && !isset($email) && !isset($password) && !isset($cpassword)) {
                $error = 'Invalida data.';
                header('Location: /signup');
                exit();
            }

            if ($password != $cpassword) {
                $error = 'Passwords dont match.';
                header('Location: /signup');
                exit();
            }

            if ($userModel->userExists($email)) {
                $error = 'User already exists with this email.';
                header('Location: /signup');
                exit();
            }

            $userCreated = $userModel->createUser($name, $email, $password, $saldo, $nivel, $estado);

            if ($userCreated) {
                header('Location: /');
                exit();
            } else {
                $error = 'Failed to create user. Please try again.';
                header('Location: /signup');
            }
        } else {
            header('Location: /signup');
        }
    }

    public function listUsers()
    {
        require_once 'app/models/UserModel.php';
        $userModel = new UserModel();


        if (!isset($_SESSION['user_id'])) {
            header(header: 'Location: /');
            exit;
        }


        $userLevel = $_SESSION['nivel'];

        if ($userLevel < 2) {
            header(header: 'Location: /home');
            exit;
        }


        $users = $userModel->getUsers();

        require_once 'app/views/userListView.php';
    }



    public function editUser()
    {
        require_once 'app/models/UserModel.php';
        $userModel = new UserModel();

        $userLevel = $userModel->getUserLevel($_SESSION['user_id']);

        if ($userLevel == 2 || $userLevel == 3) {

            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $userId = $_GET['id'] ?? null;

                if (!$userId || !is_numeric($userId)) {
                    echo "Invalid User ID";
                    exit();
                }

                $user = $userModel->getUserById($userId);

                if (!$user) {
                    echo "User not found";
                    exit();
                }

                require_once 'app/views/editUserView.php';
            } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $userId = $_POST['id'];
                $name = $_POST['nome'];
                $email = $_POST['email'];
                $saldo = $_POST['saldo'];
                $nivel = $_POST['nivel'];

                if (empty($name) || empty($email) || !is_numeric($saldo) || !is_numeric($nivel)) {
                    echo "Invalid data provided";
                    exit();
                }

                $userUpdated = $userModel->updateUser($userId, $name, $email, $saldo, $nivel);

                if ($userUpdated) {
                    header('Location: /listUsers');
                    exit();
                } else {
                    echo "Failed to update user";
                }
            }
        }else{
            header('Location: /home');
        }
    }
}
