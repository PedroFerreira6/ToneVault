<?php

class HomePageController {

    public function index(){
        if(isset($_SESSION['user_id'])){
        require_once './app/views/homeView.php';
        }else{
            header("location:/");
        }
    }

}

?>