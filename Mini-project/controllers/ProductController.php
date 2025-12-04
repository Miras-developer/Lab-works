<?php
require_once __DIR__ . '/../models/Product.php';

class ProductController {

    public function index() {

        $page  = $_GET['page'] ?? 1;
        $limit = $_GET['limit'] ?? 5;
        $search = $_GET['search'] ?? "";
        $minPrice = $_GET['minPrice'] ?? "";
        $maxPrice = $_GET['maxPrice'] ?? "";
        $sort = $_GET['sort'] ?? "";

        $limit = max(1, (int)$limit);
        $page = max(1, (int)$page);
        $offset = ($page - 1) * $limit;

        $products = Product::getAll($limit, $offset, $search, $minPrice, $maxPrice, $sort);
        $total = Product::getCount($search, $minPrice, $maxPrice);
        $totalPages = ceil($total / $limit);

        require __DIR__ . '/../views/products.php';
    }
}
