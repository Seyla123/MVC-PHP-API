<?php
namespace App\controllers;
class Products 
{
    public function index(): void
    {
        $model = new \App\Models\Product;
        $products = $model->getData();
        require "src/views/products_index.php";
    }
    public function show(): void
    {
        require "src/views/products_show.php";
    }
}