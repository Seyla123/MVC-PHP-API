<?php

class Products 
{
    public function index(): void
    {
        require "src/models/product.php";
        $model = new Product();
        $products = $model->getData();
        require "src/views/products_index.php";
    }
}