<?php
namespace App\Admin\Controllers;
use eftec\bladeone\BladeOne;
class BaseController{

    protected function render($viewFile, $data = []){
        $viewDir = "./app/admin/views";
        $storageDir = "./storage";
        $blade = new BladeOne($viewDir,$storageDir, BladeOne::MODE_DEBUG);
        echo $blade->run($viewFile, $data);
    }
    protected function checkAdminRole() {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "client/user/login");
            exit;
        }
        if ($_SESSION['user']['role'] != 1) {
            echo "<script>
                alert('Bạn không có quyền truy cập vào trang này.');
                window.location.href = '".BASE_URL."client/home_page';
              </script>";
            exit;
        }
    }
    
}

?>