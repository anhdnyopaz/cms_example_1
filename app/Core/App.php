<?php

namespace App\Core;

class App
{

    /**
     * @var Route[]
     */
    private static array $routes = [];

    // Add a new route
    public static function addRoute(Route $route): void
    {
        self::$routes[] = $route;
    }

    // function handle to handle the request
    public function handle(Request $request)
    {
        include_once __DIR__ . '/../routes/web.php';


        foreach (self::$routes as $route) {
            if ( $route->matches($request->getUri())
                && $route->getMethod() === $request->getMethod() ) {
                return call_user_func_array($route->getHandler(), []);
            }
        }
        //return 404 not found
        header("HTTP/1.0 404 Not Found");
        echo "404 Not Found";
    }

}