<?php

namespace App\Admin\Controllers;

use App\Admin\Models\{Product, Category, UserBuyProduct};

class ProductController extends BaseController
{
    protected $Category;
    protected $Product;
    protected $UserBuyProduct;
    public function __construct()
    {
        $this->Category = new Category;
        $this->Product = new Product;
        $this->UserBuyProduct = new UserBuyProduct;
    }
    // function listProduct(){
    //     $Products = $this->Product->getProduct();
    //     $Category = $this->Category->getAllCategory();
    //     $this->render('product.listProduct', compact('Products','Category'));
    // }
    function listProduct()
    {
        $Products = $this->Product->getProductByCategory();
        $this->render('product.listProduct', compact('Products'));
    }

    public function addProduct()
    {
        $Category = $this->Category->getAllCategory();
        $this->render('product.addProduct', compact('Category'));
    }
    public function createProduct()
    {
        if (isset($_POST["addproduct"]) && ($_POST["addproduct"])) {
            $name = $_POST['name'] ?? '';
            $image = $_FILES['image']['name'];
            $price = $_POST['price'] ?? '';
            $describe = $_POST['describe'] ?? '';
            $target_dir = "public/assets/img/courses/";
            $category = $_POST['category'] ?? '';
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            if (!empty($_FILES["image"]["tmp_name"])) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
            }
            if (empty($name) || empty($price) || empty($describe) || empty($category)) {
                echo "<script>alert('Vui lòng nhập đủ thông tin bắt buộc.'); window.location.href='" . BASE_URL . "admin/product/add_product';</script>";
            } else {
                $this->Product->insertProduct($name, $image, $price, $describe, $category);
                echo "<script>alert('Thêm sản phẩm thành công'); window.location.href='" . BASE_URL . "admin/product/list_product';</script>";
            }
        } else {
            $this->render('product.addProduct');
        }
    }
    public function detailProduct($id)
    {
        $Product = $this->Product->loadOneProduct($id);
        $Category = $this->Category->getAllCategory();
        $this->render('product.updateProduct', compact('Product', 'Category'));
    }
    public function editProduct()
    {
        if (isset($_POST["updateproduct"])) {
            $id = $_POST['id'];
            $name = $_POST['name'] ?? '';
            $price = $_POST['price'] ?? '';
            $describe = $_POST['describe'] ?? '';
            $category = $_POST['category'] ?? '';
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
            if (empty($name)  || empty($price) || empty($describe) || empty($category)) {
                echo "<script>alert('Vui lòng nhập đủ thông tin bắt buộc.'); window.location.href='" . BASE_URL . "admin/product/detail_product';</script>";
            } else {
                $this->Product->updateProduct($id, $name, $image, $price, $describe, $category);
                echo "<script>alert('sửa sản phẩm thành công'); window.location.href='" . BASE_URL . "admin/product/list_product';</script>";
            }
        }
        $this->render('product.updateProduct', compact('Product'));
    }
    public function deleteProduct($id)
    {
        $this->Product->deleteOneProduct($id);
        echo "<script>alert('xóa sản phẩm thành công'); window.location.href='" . BASE_URL . "admin/product/list_product';</script>";
    }
    public function listProductByUser($id) {
        $Products = $this->UserBuyProduct->listProductByUser($id);
        $Category = $this->Category->getAllCategory();

        $this->render('product.listProductByUser', compact('Products', 'Category'));
    }
        
}
