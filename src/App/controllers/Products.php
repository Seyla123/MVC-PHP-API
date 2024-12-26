<?php

declare(strict_types=1);

namespace App\controllers;

use App\Models\Product;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;

class Products extends Controller
{
    public function __construct(private Product $model) {}
    public function index(): Response
    {
        $products = $this->model->findAll();

        return $this->view("Products/index.mvc.php", [
            "products" => $products,
            "total" => $this->model->getTotal()
        ]);
    }
    public function show(string $id): Response
    {
        $product = $this->model->find($id);

        if (!$product) {
            throw new PageNotFoundException("Product with id '$id' not found.");
        }

        return $this->view("Products/show.mvc.php", [
            "product" => $product
        ]);
    }
    public function edit(string $id): Response
    {
        $product = $this->getProduct($id);

        return $this->view("Products/edit.mvc.php", [
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
    public function new(): Response
    {
        return $this->view("Products/new.mvc.php");
    }
    public function create(): Response
    {
        $data = [
            "name" => $this->request->post["name"],
            "description" => $this->request->post["description"]
        ];

        if ($this->model->insert($data)) {
            return $this->redirect("/products/{$this->model->getInsertID()}/show");
        } else {
            return $this->view("Products/new.mvc.php", [
                "errors" => $this->model->getErrors(),
                "product" => $data
            ]);
        }
    }
    public function update(string $id): Response
    {
        $product = $this->getProduct($id);

        $product["name"] = $this->request->post["name"];
        $product["description"] = $this->request->post["description"];

        if ($this->model->update($id, $product)) {
            return $this->redirect("/products/{$id}/show");
        } else {
            return $this->view("Products/edit.mvc.php", [
                "errors" => $this->model->getErrors(),
                "product" => $product
            ]);
        }
    }
    public function delete(string $id): Response
    {
        $product = $this->getProduct($id);

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->model->delete($id);
            return $this->redirect("/products");
        }

        return $this->view("Products/delete.mvc.php", [
            "product" => $product
        ]);
    }
    public function destroy(string $id): Response
    {
        $product = $this->getProduct($id);
        $this->model->delete($id);
        return $this->redirect("/products/index");
    }
}
