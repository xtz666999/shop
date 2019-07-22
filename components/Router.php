<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $this->routes = require_once 'config/routes.php';
    }

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        $uri = $this->getURI();
        

        foreach ($this->routes as $pattern => $value) {

            if (preg_match("~$pattern~", $uri)) {

                $internalRoute = preg_replace("~$pattern~", $value, $uri);
              
                $internalRouteArr = explode('/', $internalRoute);

                $controllerName = ucfirst(array_shift($internalRouteArr)) . 'Controller';
                $actionName = 'action' . ucfirst(array_shift($internalRouteArr));

                

                $parameters = $internalRouteArr;    

                // $id = (int) array_shift($internalRouteArr);
                // $page = (int) array_shift($internalRouteArr);                

                $pathToController = sprintf('controllers/%s.php', $controllerName);

                if (file_exists($pathToController)) {
                    include_once $pathToController;                    
                }

                $controllerObject = new $controllerName;
                $res = $controllerObject->$actionName($parameters);

                if ($res != null) {
                    break;
                }
            }
        }
    }
}