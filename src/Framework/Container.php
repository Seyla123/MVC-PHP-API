<?php 
namespace Framework;

use ReflectionClass;

class Container
{
    public function get(string $class_name): object
    {
        $reflection = new ReflectionClass($class_name);
        $contructor = $reflection->getConstructor();

        if($contructor === null){
            return new $class_name;
        }
        foreach($contructor->getParameters() as $parameter){
            $type = (string) $parameter->getType();
            $dependencies[] = $this->get($type);
        }
        return new $class_name(...$dependencies);
    }
}