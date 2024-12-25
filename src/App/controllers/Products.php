<?php
declare(strict_types=1);

namespace App\controllers;
use App\Models\Product;
use Framework\Viewer;
use Framework\Exceptions\PageNotFoundException;

class Products 
{
    public function __construct(private Viewer $viewer, private Product $model){}
    public function index(): void
    {
        $products = $this->model->findAll();

        echo $this->viewer->render("shared/header.php",[
            "title" => "Products"
        ]);
        echo $this->viewer->render("Products/index.php", [
            "products"=> $products
        ]);
    }
    public function show(string $id): void
    {
        $product = $this->model->find($id);

        if(!$product) {
            throw new PageNotFoundException("Product with id '$id' not found.");
        }

        echo $this->viewer->render("shared/header.php",[
            "title" => "Products"
        ]);
        echo $this->viewer->render("Products/show.php", [
            "product"=> $product
        ]);
    }
    public function showPage(string $title, string $id, string $page )
    {
       echo $title, " " , $id," ", $page;
    }
    public function new()
    {
        echo $this->viewer->render("shared/header.php",[
            "title" => "New Product"
        ]);
        echo $this->viewer->render("Products/new.php");
    }
}