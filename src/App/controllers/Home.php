<?php 
namespace App\controllers;
class Home {
    public function index(): void
    {
        require "src/views/home_index.php";
    }
}