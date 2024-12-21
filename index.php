<?php 

    $action = $_GET["action"]??"index";
    $controller = $_GET["controller"]??"products";	

    require "src/controllers/$controller.php";
    $controller_object = new $controller;
    $controller_object->$action();