<?php

namespace App\Client\Controllers;
use App\Client\Models\{Product,Category};
class HomePageController extends BaseController
{
    protected $Category;
    protected $Product;
    public function __construct()
    {
        $this->Category = new Category;
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
}

