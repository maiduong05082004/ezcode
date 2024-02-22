<?php

namespace App\Client\Controllers;
use App\Client\Models\{Product,Category,User};
class PaymentController extends BaseController
{
    protected $Category;
    protected $Product;
    protected $User;
    public function __construct()
    {
        $this->checkSESSION() ;
        $this->Category = new Category;
        $this->Product=new Product;
        $this->User=new User;
    }  
    public function inPayment() {
        $_SESSION['product_id'] = $_POST['product_id'];
        $Product = $this->Product->loadOneProduct($_SESSION['product_id']);
        $User = $this->User->loadOneUser($_SESSION['user']['id']);
        $this->render( 'payment.inPayment',compact('Product','User') );
    }

}

