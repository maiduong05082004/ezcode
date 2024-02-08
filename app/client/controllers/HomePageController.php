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
}
