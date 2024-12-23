<?php

namespace Framework;
class Dispatcher
{
    public function __construct(private Router $router)
    {
    }
    public function handle(string $path)
    {
        $params = $this->router->match($path);

        if($params === false){
            exit("404, No route matched.");
        }

        $action = $params["action"];
        $controller = "App\\controllers\\" . ucwords($params["controller"]);

        $controller_object = new $controller;
        $controller_object->$action();
    }
}