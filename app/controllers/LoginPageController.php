<?php

class LoginPageController {

    public function index(){
        if(!isset($_SESSION['user_id']))require_once './app/views/loginView.php';
        else header("location:/home");
    }

}

?>