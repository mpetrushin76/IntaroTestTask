<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath=ROOT.'/Config/routes.php';
        $this->routes = include($routesPath);
    }

    /**
     * Возвращает строку URI
     */
    private function getURI ()
    {
        if(!empty($_SERVER["REQUEST_URI"]))
        {
            return trim($_SERVER["REQUEST_URI"], '/');
        }
    }
    public function run()
    {
        $uri = $this->getURI();
        
        foreach($this->routes as $uriPattern => $path)
        {
            if(preg_match("~$uriPattern~", $uri))
            {
               $path = preg_replace("~$uriPattern~", $path, $uri);
           
               $segments = explode('/', $path);
               array_shift($segments);
               $controllerName = ucfirst(array_shift($segments).'Controller');
               
               $actionName = 'action'.ucfirst(array_shift($segments));
               
               $controllerFile = ROOT.'/Controllers/'.$controllerName.'.php';
               if(file_exists($controllerFile))
               {
                   include_once($controllerFile);
               }
              
               $controllerObject = new $controllerName;
               $result = $controllerObject->$actionName($segments);
               if($result!=NULL)
               {
                   break;
               }
            }
        }
        
       
        
    }

}