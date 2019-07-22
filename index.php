<?php

session_start();

function __autoload($className)
{
    // массив с директориями классов
    $arrayPath = array(
        'components/',
        'controllers/',
        'models/'
    );

    foreach ($arrayPath as $path) {
        $path = $path . $className . '.php';
        if (file_exists($path)) {
            include_once $path;
        }        
    }
}

$router = new Router;
$router->run();




