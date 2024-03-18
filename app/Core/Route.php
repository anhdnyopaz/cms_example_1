<?php

namespace App\Core;

class Route
{

    public function __construct(
        readonly private string $path,
        readonly private string $method,
        readonly private string $controller,
        readonly private string $action)
    {
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getHandler():array
    {
        //I want to run method of PageController class
        $controllerObject = new $this->controller();
        return [ $controllerObject, $this->action];

    }

    public function matches(string $uri): bool
    {
        return ( ltrim($this->path, '/') === ltrim($uri, '/') );
    }

}