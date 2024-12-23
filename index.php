<?php 

    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    spl_autoload_register(function ($class_name){
        require "src/$class_name.php";
    });

    $router = new Router();
    $router->add("/", ["controller" => "Home", "action" => "index"]);
    $router->add("/home/index", ["controller" => "Home", "action" => "index"]);
    $router->add("/products", ["controller" => "Products", "action" => "index"]);
    $params = $router->match($path);

    if($params === false){
        exit("404, No route matched.");
    }

    $action = $params["action"];
    $controller = $params["controller"];

    $controller_object = new $controller;
    $controller_object->$action();