<?php
namespace App\Core;
// Using Design pattern : Builder

class RouteBuilder
{
    private string $path;
    private string $method;
    private $handler;

    // Set the path
    private string $controller;
    private string $action;

    public function setPath(string $path)
    {
        $this->path = $path;
        return $this;
    }

    // Set the method
    public function setMethod(string $method)
    {
        $this->method = $method;
        return $this;
    }

    // Set the handler
    public function setHandler(array $handler)
    {
        $this->controller = $handler[0];
        $this->action = $handler[1];
        return $this;
    }

    // Build the Route
    public function build()
    {
        return new Route($this->path, $this->method, $this->controller, $this->action);
    }

    public static function get(string $path, array $handler)
    {
        $route = (new self())->setPath($path)->setMethod('GET')
            ->setHandler($handler)->build();
        App::addRoute($route);

    }

    public static function post(string $path, string $handler)
    {
        $route = (new self())->setPath($path)->setMethod('POST')
            ->setHandler($handler)->build();
        App::addRoute($route);

    }

    public static function any(string $path, string $handler)
    {
        $route = (new self())->setPath($path)->setMethod('ANY')
            ->setHandler($handler)->build();
        App::addRoute($route);
    }
}