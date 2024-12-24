<?php 
namespace Framework;

use Closure;
use ReflectionClass;

class Container
{
    private array $registry = [];
    public function set(string $name, Closure $value): void 
    {
        $this->registry[$name] = $value;
    }
    public function get(string $class_name): object
    {
        if(array_key_exists($class_name, $this->registry)){
            return $this->registry[$class_name]();
        }
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