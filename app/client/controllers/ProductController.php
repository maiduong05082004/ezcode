<?php

namespace App\Client\Controllers;
use App\Client\Models\{Product,Category,UserBuyProduct,User};
class ProductController extends BaseController
{
    protected $Category;
    protected $UserBuyProduct;
    protected $Product;
    protected $User;
    public function __construct()
    {
        $this->Category = new Category;
        $this->Product=new Product;
        $this->UserBuyProduct=new UserBuyProduct;
        $this->User=new User;
    }  
    public function productDetail($id){
        $Product = $this->Product->loadOneProduct($id);
        $this->render( 'product.productDetail',compact('Product'));
    }
    public function listProduct(){
        $categoryId = $_GET['category'] ?? null;
    
        if($categoryId) {
            $Products = $this->Product->getProductByCategory($categoryId);
        } else {
            $Products = $this->Product->getProduct();
        }
        $Categorys = $this->Category->getAllCategory();
        $this->render( 'product.listProduct',compact('Products','Categorys'));
    }
    public function membership(){
        $this->render( 'membership.membershipPackage');
    }
    // public function listProductByUser($id) {
    //     $Products = $this->UserBuyProduct->listProductByUser($id);
    //     $User = $this->User->loadOneUser($id);
    //     $this->render('product.listProductByUser', compact('Products','User'));
    // }
    public function listProductByUser($id) {
        $Products = $this->UserBuyProduct->listProductByUser($id);
        $User = $this->User->loadOneUser($id);
        if ($id=="client") {
            $message = 'Bạn cần đăng nhập để xem khóa học đang học.';
        } elseif (empty($Products)) {
            $message = 'Bạn chưa đăng kí khóa học nào.';
        } else {
            $message = '';
        }
    
        $this->render('product.listProductByUser', compact('Products', 'User', 'message'));
    }
    
}