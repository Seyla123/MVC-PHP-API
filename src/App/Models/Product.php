<?php
namespace App\Models;
use PDO;
use App\Database;
class Product
{
    public function getData(): array
    {
        $database = new Database();
        $pdo = $database->getConnection();
        $stmt = $pdo->query("SELECT * FROM product");
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
}
