
    <h1>Products</h1>
    <?php foreach ($products as $product): ?>
        <a href="/products/<?= $product['id'] ?>/show"><?=htmlspecialchars($product['name'])?></a>
    <?php endforeach; ?>
</body>
</html>