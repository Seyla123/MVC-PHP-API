<?php 

$dsn = "mysql:host=localhost;dbname=product_db;charset=utf8;port=3306";

$pdo = new PDO($dsn, 'product_db_user', 'Seyla758@',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$stmt = $pdo->query("SELECT * FROM product");
$pruducts = $stmt->fetchAll(PDO::FETCH_ASSOC);

print_r($pruducts);
?>