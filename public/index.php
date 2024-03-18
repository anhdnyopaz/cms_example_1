<?php
// include the autoloader
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\App;
use App\Core\Request;

// Create a new App
$app = new App();

if(!function_exists('dd')) {
    function dd(): void {
        echo "<pre>";
        //get all arguments of functions
        $args = func_get_args();
        foreach($args as $arg) {
            var_dump($arg);

        }

        echo "</pre>";
        die();
    }
}


$request = new Request($_SERVER['REQUEST_METHOD'],$_SERVER['REQUEST_URI']);

// call RouteBuilder to build routes




$app->handle(request: $request);

