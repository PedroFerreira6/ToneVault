<?php

class UploadController {

    public function index(){
        if(isset($_SESSION['user_id'])){
        require_once './app/views/uploadView.php';
        }else{
            header("location:/");
        }
    }

}

?>