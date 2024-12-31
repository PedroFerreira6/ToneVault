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

    public function editPassword()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['cpassword'];

        if (($password === $confirmPassword) && (!empty($password)) && ($password)!='') {
            $userModel = new UserModel();
            $success = $userModel->updatePassword($userId, $password);

            if ($success) {
                echo "<script>
                alert('Password updated successfully!!');
                setTimeout(function() {
                    window.location.href = '/profile';
                }, 1);
            </script>";
                exit;
            } else {
                echo "<script>
                alert('Failed to update password. Please try again!!');
                setTimeout(function() {
                    window.location.href = '/profile';
                }, 1);
            </script>";
            }
        } else {
            echo "<script>
                alert('Passwords do not match!!');
                setTimeout(function() {
                    window.location.href = '/profile';
                }, 1);
            </script>";
        }
        header('Location: /profile');
        exit;
    } else {
        header('Location: /');
        exit;
    }
}


}