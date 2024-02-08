<?php

namespace App\Client\Controllers;
use App\Client\Models\{Product,category};
class HomePageController extends BaseController
{
    protected $Category;
    protected $Product;
    public function __construct()
    {
        $this->Category = new category();
        $this->Product=new Product;
    }  
    public function index() {
        $Products = $this->Product->getProductTop9();
        $this->render( 'homePage.homePage' ,compact('Products'));
    }
    public function productDetail($id){
        $Product = $this->Product->loadOneProduct($id);
        $this->render( 'product.productDetail',compact('Product'));
    }
    public function listProduct(){
        // Lấy ID của danh mục từ URL
        $categoryId = $_GET['category'] ?? null;
    
        // Nếu có ID danh mục, lấy sản phẩm theo danh mục
        if($categoryId) {
            $Products = $this->Product->getProductByCategory($categoryId);
        } else {
            // Nếu không, lấy tất cả sản phẩm
            $Products = $this->Product->getProduct();
        }
    
        // Lấy tất cả danh mục
        $Categorys = $this->Category->getAllCategory();
    
        // Trả về view với dữ liệu sản phẩm và danh mục
        $this->render( 'product.listProduct',compact('Products','Categorys'));
    }
}
