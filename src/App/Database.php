<?php 
namespace App;
use PDO;
class Database
{
    public function getConnection():PDO
    {
        $dsn = "mysql:host=localhost;dbname=product_db;charset=utf8;port=3306";

        $pdo = new PDO($dsn, 'product_db_user', 'Seyla758@', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);

        return $pdo;
    }
}