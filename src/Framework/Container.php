<?php 
declare(strict_types=1);
namespace Framework;

use Closure;
use ReflectionClass;
use ReflectionNamedType;

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
            $type = $parameter->getType();
            if($type === null){
                exit("Contructor parameter '{$parameter->getName()}' in the $class_name class has no type declaration.");
            }

            if(!$type instanceof ReflectionNamedType){
                exit("Contructor parameter '{$parameter->getName()}' in the $class_name class has invalid type: $type - only single named types supported.");
            }

            if($type->isBuiltin()){
                exit("Unable to resolve contructor parameters
                '{$parameter->getName()}'
                of type '{$type}' in the $class_name class.");
            }
            $dependencies[] = $this->get((string) $type);
        }
        return new $class_name(...$dependencies);
    }
}