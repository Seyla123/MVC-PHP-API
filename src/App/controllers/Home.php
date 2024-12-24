<?php 
namespace App\controllers;
use Framework\Viewer;
class Home {
    public function index(): void
    {
        $viewer = new Viewer;
        echo $viewer->render("Home/index.php");
    }
}