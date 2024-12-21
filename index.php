<?php 
require __DIR__.'/model.php';
$model = new Model();
$products = $model->getData();
require __DIR__.'/view.php';
?>