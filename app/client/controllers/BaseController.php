<?php
namespace App\Client\Controllers;
use eftec\bladeone\BladeOne;
class BaseController{

    protected function render($viewFile, $data = []){
        $viewDir = "./app/client/views";
        $storageDir = "./storage";
        $blade = new BladeOne($viewDir,$storageDir, BladeOne::MODE_DEBUG);
        echo $blade->run($viewFile, $data);
    }
    protected function checkSESSION() {
        if(!isset($_SESSION['user']) && empty($_SESSION['user'])){
            header("Location: " . BASE_URL . "client/user/login");
            exit;
        }
    }
}

?>