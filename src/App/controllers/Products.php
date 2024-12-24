<?php
namespace App\controllers;
use App\Models\Product;
use Framework\Viewer;

class Products 
{
    public function index(): void
    {
        $model = new Product;
        $products = $model->getData();

        $viewer = new Viewer;
        require "src/views/products_index.php";
    }
    public function show(string $id): void
    {
        var_dump($id);
        require "src/views/products_show.php";
    }
    public function showPage(string $title, string $id, string $page )
    {
       echo $title, " " , $id," ", $page;
    }
}