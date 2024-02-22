<?php

namespace App\Client\Controllers;
use App\Client\Models\{Product,Category,User};
class HomePageController extends BaseController
{
    protected $Category;
    protected $Product;
    protected $User;
    public function __construct()
    {
        $this->Category = new Category;
        $this->Product=new Product;
        $this->User=new User;
    }  
    public function index() {
        $Products = $this->Product->getProductTop9();
        $this->render( 'homePage.homePage' ,compact('Products'));
    }

}

