<?php 
    require "src/controllers/products.php";
    $controller = new Products();

    $action = $GET["action"]??"index";

    if($action == 'show') {
        $controller->show();
    }else{
        $controller->index();
    }