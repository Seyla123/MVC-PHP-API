<?php
namespace App\controllers;
use App\Models\Product;
class Products 
{
    public function index(): void
    {
        $model = new Product;
        $products = $model->getData();
        require "src/views/products_index.php";
    }
    public function show(): void
    {
        require "src/views/products_show.php";
    }
}