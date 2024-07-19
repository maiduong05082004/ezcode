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
                        header("Location: " . BASE_URL . "");
                    }
                } else {
                    $thongbao = "Tài khoản hoặc mật khẩu không đúng!";
                }
            }
        }
        $this->render('user.login', ['thongbao' => $thongbao]);
    }
    public function forgetPassword()
    {
        $this->render('user.forgetPassword');
    }
    
    public function updatePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $currentPassword = $_POST['currentPassword'] ?? '';
            $newPassword = $_POST['newPassword'] ?? '';
            $confirmNewPassword = $_POST['confirmNewPassword'] ?? '';

            // Kiểm tra xem người dùng có đăng nhập không và lấy thông tin người dùng
            $user = $_SESSION['user'] ?? null;
            if (!$user) {
                echo "<script>alert('Bạn cần đăng nhập để thực hiện thay đổi này.'); window.location.href='" . BASE_URL . "client/user/login';</script>";
                return;
            }

            // Kiểm tra mật khẩu hiện tại
            if (!$this->User->checkPassword($user['id'], $currentPassword)) {
                echo "<script>alert('Mật khẩu hiện tại không chính xác.'); window.location.href='" . BASE_URL . "client/user/forgetPassword';</script>";
                return;
            }

            // Kiểm tra mật khẩu mới và xác nhận mật khẩu
            if ($newPassword !== $confirmNewPassword) {
                echo "<script>alert('Mật khẩu mới và xác nhận mật khẩu không khớp.'); window.location.href='" . BASE_URL . "client/user/forgetPassword';</script>";
                return;
            }

            // Điều kiện để mật khẩu mới hợp lệ
            if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $newPassword)) {
                echo "<script>alert('Mật khẩu mới phải có ít nhất 8 ký tự, bao gồm ít nhất một chữ hoa, một chữ thường, một số, và một ký tự đặc biệt.'); window.location.href='" . BASE_URL . "client/user/forgetPassword';</script>";
                return;
            }

            // Cập nhật mật khẩu mới
            if ($this->User->updatePassword($user['id'], $newPassword)) {
                echo "<script>alert('Mật khẩu đã được cập nhật thành công.'); window.location.href='" . BASE_URL . "';</script>";
            } else {
                echo "<script>alert('Đã xảy ra lỗi, không thể cập nhật mật khẩu.'); window.location.href='" . BASE_URL . "client/user/forgetPassword';</script>";
            }
        } else {
            // Hiển thị form nếu không phải POST
            $this->render('user.forgetPassword');
        }
    }
    public function showProfile()
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . 'client/user/login');
            exit;
        }

        // Lấy thông tin người dùng từ session
        $userId = $_SESSION['user']['id'];
        $User = $this->User->loadOneUser($userId);
        
        // Truyền thông tin người dùng tới view
        $this->render('user.profile', compact('User'));
    }
    public function logout(){
        session_unset();
        echo "<script>window.history.back();</script>";
    }

    
}
