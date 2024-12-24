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
        echo $viewer->render("Products/index.php", [
            "products"=> $products
        ]);
    }
    public function show(string $id): void
    {
        $viewer = new Viewer;
        echo $viewer->render("Products/show.php", [
            "id"=> $id
        ]);
    }
    public function showPage(string $title, string $id, string $page )
    {
       echo $title, " " , $id," ", $page;
    }
}