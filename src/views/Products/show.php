<h1><?= $product["name"] ?></h1>
<p><?= $product["description"] ?></p>
<a href="/products/<?= $product['id'] ?>/edit">Edit</a>
<a href="/products/<?= $product['id'] ?>/delete">Delete</a>

</body>
</html>