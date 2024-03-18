<?php

namespace App\Core;

class Request
{
    private string $method;
    private string $uri;

    /**
     * @param string $method
     * @param string $uri
     */
    public function __construct(string $method, string $uri)
    {
        $this->method = $method;
        $this->uri = $uri;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getMethod(): string
    {
        return $this->method;
    }


}