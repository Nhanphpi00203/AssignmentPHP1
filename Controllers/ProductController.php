<?php
require_once 'Model/ProductModel.php';

class ProductController {
    public function index() {
        $productModel = new Product();
        $products = $productModel->getAllProducts();
        require_once 'views/products/index.php';
    }
}
?>
