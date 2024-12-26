<?php

declare(strict_types=1);

namespace App\controllers;

use App\Models\Product;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;

class Products extends Controller
{
    public function __construct(private Product $model) {}
    public function index(): void
    {
        $products = $this->model->findAll();

        echo $this->viewer->render("Products/index.mvc.php", [
            "products" => $products,
            "total" => $this->model->getTotal()
        ]);
    }
    public function show(string $id): void
    {
        $product = $this->model->find($id);

        if (!$product) {
            throw new PageNotFoundException("Product with id '$id' not found.");
        }

        echo $this->viewer->render("Products/show.mvc.php", [
            "product" => $product
        ]);
    }
    public function edit(string $id): void
    {
        $product = $this->getProduct($id);

        echo $this->viewer->render("shared/header.php", [
            "title" => "Edit Products"
        ]);
        echo $this->viewer->render("Products/edit.php", [
            "product" => $product
        ]);
    }
    private function getProduct(string $id): array
    {
        $product = $this->model->find($id);

        if (!$product) {
            throw new PageNotFoundException("Product with id '$id' not found.");
        }

        return $product;
    }
    public function showPage(string $title, string $id, string $page)
    {
        echo $title, " ", $id, " ", $page;
    }
    public function new()
    {
        echo $this->viewer->render("shared/header.php", [
            "title" => "New Product"
        ]);
        echo $this->viewer->render("Products/new.php");
    }
    public function create()
    {
        $data = [
            "name" => $this->request->post["name"],
            "description" => $this->request->post["description"]
        ];

        if ($this->model->insert($data)) {
            header("Location: /products/{$this->model->getInsertID()}/show");
            exit;
        } else {
            echo $this->viewer->render("shared/header.php", [
                "title" => "New Product"
            ]);
            echo $this->viewer->render("Products/new.php", [
                "errors" => $this->model->getErrors(),
                "product" => $data
            ]);
        }
    }
    public function update(string $id)
    {
        $product = $this->getProduct($id);

        $product["name"] = $this->request->post["name"];
        $product["description"] = $this->request->post["description"];

        if ($this->model->update($id, $product)) {
            header("Location: /products/{$id}/show");
            exit;
        } else {
            echo $this->viewer->render("shared/header.php", [
                "title" => "Edit Product"
            ]);
            echo $this->viewer->render("Products/edit.php", [
                "errors" => $this->model->getErrors(),
                "product" => $product
            ]);
        }
    }
    public function delete(string $id)
    {
        $product = $this->getProduct($id);

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->model->delete($id);
            header("Location: /products");
            exit;
        }

        echo $this->viewer->render("shared/header.php", [
            "title" => "Delete Product"
        ]);
        echo $this->viewer->render("Products/delete.php", [
            "product" => $product
        ]);
    }
    public function destroy(string $id)
    {
        $product = $this->getProduct($id);
        $this->model->delete($id);
        header("Location: /products/index");
        exit;
    }
}
