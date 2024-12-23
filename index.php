<?php 

    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    spl_autoload_register(function ($class_name){
        require "src/" . str_replace("\\", "/", $class_name). ".php";
    });

    $router = new Framework\Router();
    // $router->add("/{controller}/{action}");
    $router->add("/product/{slug:[\w-]+}", ["controller" => "Products", "action" => "show"]);
    $router->add("/{controller}/{id:\d+}/{action}");
    $router->add("/home/index", ["controller" => "home", "action" => "index"]);
    $router->add("/products", ["controller" => "Products", "action" => "index"]);
    $router->add("/", ["controller" => "home", "action" => "index"]);
    $params = $router->match($path);

    if($params === false){
        exit("404, No route matched.");
    }

    $action = $params["action"];
    $controller = "App\\controllers\\" . ucwords($params["controller"]);

    $controller_object = new $controller;
    $controller_object->$action();