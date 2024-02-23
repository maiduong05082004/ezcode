<?php

namespace App\Client\Controllers;

use App\Client\Models\{Product, Category, User};

class PaymentController extends BaseController
{
    protected $Category;
    protected $Product;
    protected $User;

    public function __construct()
    {
        $this->checkSESSION();
        $this->Category = new Category;
        $this->Product = new Product;
        $this->User = new User;
    }

    public function inPayment()
    {
        $_SESSION['product_id'] = $_POST['product_id'];
        $Product = $this->Product->loadOneProduct($_SESSION['product_id']);
        $User = $this->User->loadOneUser($_SESSION['user']['id']);
        $this->render('payment.inPayment', compact('Product', 'User'));
    }

    public function billcomfim()
    {
        $orderId = $_GET['orderId'] ?? 'Không có dữ liệu';
        $amount = $_GET['amount'] ?? 'Không có dữ liệu';
        $orderInfo = $_GET['orderInfo'] ?? 'Không có dữ liệu';
        $transId = $_GET['transId'] ?? 'Không có dữ liệu';
        $resultCode = $_GET['resultCode'] ?? 'Không có dữ liệu';
        $message = $_GET['message'] ?? 'Không có dữ liệu';
        $this->render('payment.billcomfim', compact('orderId', 'amount', 'orderInfo', 'transId', 'resultCode', 'message'));
        unset($_SESSION['user_details']);
    }

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    public function onlineCheckout()
    {
        if (isset($_POST['payUrl'])) {
            $_SESSION['user_details'] = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'address' => $_POST['address'],
                'tel' => $_POST['tel'],
                'product_price' => $_POST['product_price']
            ];
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderInfo = "Thanh toán qua MoMo";
            $amount = 10000;
            $orderId = rand(000000, 999999);
            $redirectUrl = "http://localhost/php/xuongezcode/test/client/home_page";
            $ipnUrl = "http://localhost/php/xuongezcode/test/client/payment/billcomfim";
            $extraData = "";

            $partnerCode = $partnerCode;
            $accessKey =  $accessKey;
            $serectkey = $secretKey;
            $orderId = $orderId; // Mã đơn hàng
            $orderInfo = $orderInfo;
            $amount = $amount;
            $ipnUrl = $ipnUrl;
            $redirectUrl = $redirectUrl;
            $extraData = $extraData;

            $requestId = time() . "";
            $requestType = "payWithATM";
            // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $serectkey);
            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );
            $result = $this->execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);  // decode json

            //Just a example, please check more in there

            header('Location: ' . $jsonResult['payUrl']);
        } elseif (isset($_POST['vnpay'])) {
            echo "thơm vào môi";
        } elseif (isset($_POST['COD'])) {
            $_SESSION['user_details'] = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'address' => $_POST['address'],
                'tel' => $_POST['tel'],
                'product_price' => $_POST['product_price']
            ];            
            $orderId = rand(000000, 999999);
            $orderInfo = "Thanh toán qua COD";
            $resultCode = 0;
            $message = $_GET['message'] ?? 'Thanh toán sau 15 ngày';
            $transId = rand(000000000, 999999999);
            $queryString = "orderId=$orderId&orderInfo=$orderInfo&resultCode=$resultCode&message=$message&transId=$transId";
            header("Location: http://localhost/php/xuongezcode/test/client/payment/billcomfim?$queryString");
            exit;
        }
    }
}
