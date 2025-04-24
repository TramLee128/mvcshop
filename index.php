<?php
define('BASE_PATH', __DIR__);
spl_autoload_register(function ($class) {
    $path = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        require_once $path;
    } else {
        echo "❌ Không tìm thấy file: $path<br>";
    }
});

// Lấy URL từ query string: ?url=Home/index
$url = $_GET['url'] ?? 'Home/index'; // fallback nếu không có gì
$urlArr = explode('/', $url);

// Lấy tên controller và method
$controllerClassName = ucfirst($urlArr[0]) . "Controller";
$method = $urlArr[1] ?? 'index'; // thêm dòng này để fix lỗi bạn gặp

// Thêm namespace
$fullClass = "App\\Controllers\\$controllerClassName";

// Kiểm tra rồi gọi
if (class_exists($fullClass)) {
    $controller = new $fullClass();

    if (method_exists($controller, $method)) {
        call_user_func([$controller, $method]);
    } else {
        echo "❌ Method '$method' not found in class $fullClass.";
    }
} else {
    echo "❌ Controller class '$fullClass' not found.";
}

// if ($urlArr[0] == 'product') {
//     $controler = new ProductController();
//     if ($urlArr[1] == "create") {
//         $controler->index();
//     } else
//         $controler->index();
// } elseif ($urlArr[0] == 'user') {
//     $controler = new UserController();
//     if ($urlArr[1] == "create") {
//         $controler->index();
//     } else
//         $controler->index();
// } else {
//     echo "no where to go";
// }
