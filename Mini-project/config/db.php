<?php
class DB {
    public static function connect() {
        $host = "localhost";
        $db   = "shop";
        $user = "root";
        $pass = "";

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("DB Error: " . $e->getMessage());
        }
    }
}
