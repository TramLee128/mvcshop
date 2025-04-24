<?php
namespace App\Controllers;
use App\Model\ProductModel;
class HomeController
{
    public function index()
    {
        $product = new ProductModel();
        $productList = $product->getAllProducts();

        include BASE_PATH . '/app/views/home.php';
    }
}
