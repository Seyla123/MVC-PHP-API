<?php 

$container  = new Framework\Container;

$container->set(App\Database::class, function(){
    return new App\Database("localhost", "product_db", "product_db_user", "Seyla758@");
});

return $container;