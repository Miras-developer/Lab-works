<?php
require_once __DIR__ . '/../config/db.php';

class Product {

    public static function getAll($limit, $offset, $search, $minPrice, $maxPrice, $sort) {
        $pdo = DB::connect();

        $query = "SELECT * FROM products WHERE 1=1";

        if (!empty($search)) {
            $query .= " AND name LIKE :search";
        }
        if (!empty($minPrice)) {
            $query .= " AND price >= :minPrice";
        }
        if (!empty($maxPrice)) {
            $query .= " AND price <= :maxPrice";
        }

        // сортировка
        $allowedSort = ["name_asc", "name_desc", "price_asc", "price_desc"];
        if (in_array($sort, $allowedSort)) {
            $parts = explode("_", $sort);
            $column = $parts[0];
            $order = strtoupper($parts[1]);
            $query .= " ORDER BY $column $order";
        }

        $query .= " LIMIT :limit OFFSET :offset";

        $stmt = $pdo->prepare($query);

        if (!empty($search)) {
            $stmt->bindValue(":search", "%$search%", PDO::PARAM_STR);
        }
        if (!empty($minPrice)) {
            $stmt->bindValue(":minPrice", $minPrice, PDO::PARAM_INT);
        }
        if (!empty($maxPrice)) {
            $stmt->bindValue(":maxPrice", $maxPrice, PDO::PARAM_INT);
        }

        $stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
        $stmt->bindValue(":offset", $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getCount($search, $minPrice, $maxPrice) {
        $pdo = DB::connect();
        $query = "SELECT COUNT(*) FROM products WHERE 1=1";

        if (!empty($search)) {
            $query .= " AND name LIKE :search";
        }
        if (!empty($minPrice)) {
            $query .= " AND price >= :minPrice";
        }
        if (!empty($maxPrice)) {
            $query .= " AND price <= :maxPrice";
        }

        $stmt = $pdo->prepare($query);

        if (!empty($search)) {
            $stmt->bindValue(":search", "%$search%", PDO::PARAM_STR);
        }
        if (!empty($minPrice)) {
            $stmt->bindValue(":minPrice", $minPrice, PDO::PARAM_INT);
        }
        if (!empty($maxPrice)) {
            $stmt->bindValue(":maxPrice", $maxPrice, PDO::PARAM_INT);
        }

        $stmt->execute();
        return $stmt->fetchColumn();
    }
}
