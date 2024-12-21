<?php 

    $action = $_GET["action"]??"index";
    $controller = $_GET["controller"]??"products";	

    if($controller === 'products') {
        require "src/controllers/products.php";
        $controller_object = new Products();
    }elseif ($controller === "home") {
        require "src/controllers/home.php";
        $controller_object = new Home();
    }
    if($action === 'show') {
        $controller_object->show();
    }elseif ($action === 'index') {
        $controller_object->index();
    }