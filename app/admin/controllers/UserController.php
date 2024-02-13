<?php

namespace App\Admin\Controllers;

use App\Admin\Models\{User, Membership};

class UserController extends BaseController
{
    protected $User;
    protected $Membership;
    public function __construct()
    {
        $this->User=new User;
        $this->Membership=new Membership;
    }  
    function listUser(){
        $Users = $this->User->getUser();
        $this->render('user.listUser', compact('Users'));
    }
    
    public function addUser(){
        $this->render('user.addUser');
    }
    public function createUser(){
        if (isset($_POST["adduser"]) && ($_POST["adduser"])) {
            $name = $_POST['name'] ?? '';
            $image = $_FILES['image']['name'];
            $email = $_POST['email'] ?? '';
            $address=$_POST['address'] ?? '';
            $tel = $_POST['tel'] ?? '';
            $password = $_POST['password'];
            $username = $_POST['username'];
            $membership = $_POST['membership'];
            $target_dir = "public/assets/img/courses/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            if (!empty($_FILES["image"]["tmp_name"])) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
            }
            if (empty($name) || empty($email) || empty($tel)|| empty($address)) {
                echo "<script>alert('Vui lòng nhập đủ thông tin bắt buộc.'); window.location.href='" . BASE_URL . "admin/user/add_user';</script>";
            } else {
                $this->User->insertUser($name, $image, $email,$address, $tel, $password, $username, $membership);
                echo "<script>alert('Thêm người dùng thành công'); window.location.href='" . BASE_URL . "admin/user/list_user';</script>";
            }
            
        } else {
            $this->render('user.addUser');
        }
    
    }
    public function detailUser($id) {
            $User = $this->User->loadOneUser($id);
            $Memberships = $this->Membership->getAllMembership();
            $this->render('user.updateuser', compact('User', 'Memberships'));
        
    }
    public function editUser(){
        if (isset($_POST["updateuser"])) {
            $id=$_POST['id'];
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $address =$_POST['address']??'';
            $tel = $_POST['tel'] ?? '';
            $password = $_POST['password'];
            $username = $_POST['username'];
            $membership = $_POST['membership'];
            $image = $_FILES['image']['name'];
            $target_dir = "public/assets/img/courses/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            if (!empty($_FILES["image"]["tmp_name"])) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
            }
            if (empty($name)  || empty($email) || empty($address) || empty($tel)) {
                echo "<script>alert('Vui lòng nhập đủ thông tin bắt buộc.'); window.location.href='" . BASE_URL . "admin/user/detail_user';</script>";
            } else {
                $this->User->updateUser($id, $name, $image, $email, $address, $tel, $password, $username, $membership);
                echo "<script>alert('sửa người dùng thành công'); window.location.href='" . BASE_URL . "admin/user/list_user';</script>";
            }
        }
    $this->render('user.updateuser');
    
    }
    public function deleteUser($id){
            $this-> User->deleteOneUser($id);
            echo "<script>alert('xóa người dùng thành công'); window.location.href='" . BASE_URL . "admin/user/list_user';</script>";
        }
    }
    
