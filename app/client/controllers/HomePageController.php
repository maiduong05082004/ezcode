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

}

