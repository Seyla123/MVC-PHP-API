<?php 

$dsn = "mysql:host=localhost;dbname=product_db;charset=utf8;port=3306";

$pdo = new PDO($dsn, 'product_db_user', 'Seyla758@',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$stmt = $pdo->query("SELECT * FROM product");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

print_r($products);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC CRUD PROJECT</title>
</head>
<body>
    <h1>Products</h1>
    <?php foreach ($products as $product): ?>
        <h2><?=htmlspecialchars($product['name'])?></h2>
        <p><?=htmlspecialchars($product['description'])?></p>
    <?php endforeach; ?>
</body>
</html>