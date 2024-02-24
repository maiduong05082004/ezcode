<?php

namespace App\Client\Controllers;

use App\Client\Models\{Product, Category, User};

class UserController extends BaseController
{
    protected $Category;
    protected $Product;
    protected $User;
    public function __construct()
    {
        $this->Category = new Category();
        $this->Product = new Product;
        $this->User = new User();
    }
    public function register()
    {
        if (isset($_POST['addaccount']) && ($_POST['addaccount'])) {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirm_password = $_POST['confirm_password'] ?? '';
            $email = $_POST['email'] ?? '';
            $name = $_POST['accname'] ?? '';
            $role = $_POST['role'] ?? '2';
            $tel = $_POST['tel'] ?? '';
            $membership = $_POST['membership'] ?? '';
            $address = $_POST['address'] ?? '';
            $image = isset($_FILES['userimage']) && $_FILES['userimage']['error'] == 0 ? $_FILES['userimage']['name'] : '';
            if ($password !== $confirm_password) {
                echo "<script>alert('Mật khẩu và mật khẩu xác nhận không khớp.'); window.location.href='" . BASE_URL . "client/user/register';</script>";
            } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*]).{8,}$/", $password)) {
                echo "<script>alert('Mật khẩu phải bao gồm ít nhất 8 ký tự, bao gồm chữ thường, chữ hoa, số và ký tự đặc biệt.'); window.location.href='" . BASE_URL . "client/user/register';</script>";
            } elseif (empty($username) || empty($password) || empty($email) || empty($name)) {
                echo "<script>alert('Vui lòng nhập đủ thông tin bắt buộc.'); window.location.href='" . BASE_URL . "client/user/register';</script>";
            } else {
                $this->User->insertUser($name, $image, $email, $address, $tel, $password, $username, $membership, $role);
                echo "<script>alert('Thêm người dùng thành công'); window.location.href='" . BASE_URL . "client/user/login';</script>";
            }
        }
        $this->render('user.register');
    }

    public function login()
    {
        $thongbao = ""; 
        if (isset($_POST['loginaccount']) && ($_POST['loginaccount'])) {
            $user = $_POST['nameaccount'] ?? '';
            $password = $_POST['password'] ?? '';
            if (empty($user) || empty($password)) {
                $thongbao = "Vui lòng nhập tên tài khoản và mật khẩu!";
            } else {
                $checkuser = $this->User->checkUser($user, $password);
                if ($checkuser) {
                    $_SESSION['user'] = $checkuser;
                    if ($_SESSION['user']['role'] == 1) {
                        header("Location: " . BASE_URL . "admin/product/list_product");
                    } else {
                        echo "<script> window.history.back(); </script>";
                    }
                } else {
                    $thongbao = "Tài khoản hoặc mật khẩu không đúng!";
                }
            }
        }
        $this->render('user.login', ['thongbao' => $thongbao]);
    }
    public function logout(){
        session_unset();
        echo "<script>window.history.back();</script>";
    }

    
}
