<?php

namespace App\Admin\Controllers;

use App\Admin\Models\Category;

class CategoryController extends BaseController
{
    protected $Category;
    public function __construct()
    {
        $this->Category=new Category;
    }  
    function listCategory(){
        $Categorys = $this->Category->getAllCategory();
        $this->render('category.listCategory', compact('Categorys'));
    }
    
    public function addCategory(){
        $this->render('category.addCategory');
    }
    public function createCategory(){
        if (isset($_POST["addCategory"]) && ($_POST["addCategory"])) {
            $name = $_POST['name'] ?? '';
            
            if (empty($name)) {
                echo "<script>alert('Vui lòng nhập đủ thông tin bắt buộc.'); window.location.href='" . BASE_URL . "admin/category/add_category';</script>";
            } else {
                $this->Category->insertCategory($name);
                echo "<script>alert('Thêm sản phẩm thành công'); window.location.href='" . BASE_URL . "admin/category/list_category';</script>";
            }
            
        } else {
            $this->render('category.addCategory');
        }
    
    }
    public function detailCategory($id) {
            $Category = $this->Category->loadOneCategory($id);
            $this->render('category.updateCategory', compact('Category'));
        
    }
    public function editCategory(){
        if (isset($_POST["updateCategory"])) {
            $id=$_POST['id'];
            $name = $_POST['name'] ?? '';
            
            if (empty($name)) {
                echo "<script>alert('Vui lòng nhập đủ thông tin bắt buộc.'); window.location.href='" . BASE_URL . "admin/category/detail_category';</script>";
            } else {
                $this->Category->updateCategory($id, $name);
                echo "<script>alert('sửa sản phẩm thành công'); window.location.href='" . BASE_URL . "admin/category/list_category';</script>";
            }
        }
    $this->render('category.updateCategory', compact('Category'));
    
    }
    public function deleteCategory($id){
            $this-> Category->deleteOneCategory($id);
            echo "<script>alert('xóa sản phẩm thành công'); window.location.href='" . BASE_URL . "admin/category/list_category';</script>";
        }
    }
    
