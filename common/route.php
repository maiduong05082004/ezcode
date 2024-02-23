<?php

use App\Admin\Controllers\CategoryController;
use App\Admin\Controllers\ProductController;
use App\Admin\Controllers\UserController;
use App\Client\Controllers\UserController as  ClientUserController;
use App\Client\Controllers\HomePageController;
use App\Client\Controllers\PaymentController;
use App\Client\Controllers\ProductController as ClientProductController;
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;
$url = !isset($_GET['url']) ? "/" : $_GET['url'];
$router = new RouteCollector();
/*request method: 
- get: kéo dữ liệu từ sv về
- post: đẩy dữ liệu lên sv (thêm mới/update)
- delete: xoá dữ liệu
- any: request nào cũng dùng được 

$route: '/', '/products'
$handler: hàm xử lý
*/
// filter check đăng nhập
$router->filter('auth', function () {
    if (!isset($_SESSION['auth']) || empty($_SESSION['auth'])) {
        header('location: ' . BASE_URL . 'login');
        die;
    }
});

// khu vực cần quan tâm -----------

// Khu vực định nghĩa ra các đường dẫn
//cách định nghĩa :
//$router->phương thức http('tên route',hàm xử lý)  (cấu hình = ' ') để thành dạng chuỗi
$router->get('/', function () {
    return "đây là trang chủ";
});
$router->group(['prefix' => 'admin'], function ($router) {
    $router->group(['prefix' => 'product'], function ($router) {
        $router->get('list_product', [ProductController::class, 'listProduct']);
        $router->get('add_product', [ProductController::class, 'addProduct']);
        $router->post('create_product', [ProductController::class, 'createProduct']);
        $router->get('detail_product/{id}', [ProductController::class, 'detailProduct']);
        $router->post('edit_product', [ProductController::class, 'editProduct']);
        $router->get('delete_product/{id}', [ProductController::class, 'deleteProduct']);
        $router->get('list_product__by_user/{id}', [ProductController::class, 'listProductByUser']);
    });
    $router->group(['prefix' => 'category'], function ($router) {
        $router->get('list_category', [CategoryController::class, 'listCategory']);
        $router->get('add_category', [CategoryController::class, 'addCategory']);
        $router->post('create_category', [CategoryController::class, 'createCategory']);
        $router->get('detail_category/{id}', [CategoryController::class, 'detailCategory']);
        $router->post('edit_category', [CategoryController::class, 'editCategory']);
        $router->get('delete_category/{id}', [CategoryController::class, 'deleteCategory']);
    });
    $router->group(['prefix' => 'user'], function ($router) {
        $router->get('list_user', [UserController::class, 'listUser']);
        $router->get('add_user', [UserController::class, 'addUser']);
        $router->post('create_user', [UserController::class, 'createUser']);
        $router->get('detail_user/{id}', [UserController::class, 'detailUser']);
        $router->post('edit_user', [UserController::class, 'editUser']);
        $router->get('delete_user/{id}', [UserController::class, 'deleteUser']);
    });
});
$router->group(['prefix' => 'client'], function ($router) {
    $router->get('home_page', [HomePageController::class, 'index']);
    $router->group(['prefix' => 'product'], function ($router) {
        $router->get('membership_package', [ClientProductController::class, 'membership']);
        $router->get('product_detail/{id}', [ClientProductController::class, 'productDetail']);
        $router->get('list_product', [ClientProductController::class, 'listProduct']);
        $router->get('list_product_by_user/{id}',[ClientProductController::class,'listProductByUser']) ;
    });
    $router->group(['prefix' => 'user'], function ($router) {
        $router->any('register', [ClientUserController::class, 'register']);
        $router->any('login', [ClientUserController::class, 'login']);
        $router->get('logout', [ClientUserController::class,'logout']);
    });
    $router->group(['prefix' => 'payment'], function ($router) {
        $router->post('in_payment', [PaymentController::class, 'inPayment']);
        $router->any('online_checkout', [PaymentController::class, 'onlineCheckout']);
        $router->any('billcomfim', [PaymentController::class, 'billcomfim']);

    });
});
// khu vực cần quan tâm -----------

# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;
