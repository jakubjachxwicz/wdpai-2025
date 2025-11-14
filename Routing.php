<?php

require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/DashboardController.php';

class Routing 
{
    public static $routes = [
        'login' => [
            'controller' => 'SecurityController',
            'action' => 'login'
        ],
        'register' => [
            'controller' => 'SecurityController',
            'action' => 'register'
        ],
        'dashboard' => [
            'controller' => 'DashboardController',
            'action' => 'index'
        ]
    ];
    
    public static function route($path) 
    {
        switch ($path) 
        {
            case 'login':
            case 'register':
            case 'dashboard':
                $controller = self::$routes[$path]['controller'];
                $action = self::$routes[$path]['action'];
                $id = 0;

                $controllerObj = new $controller();
                $controllerObj->$action($id);
                break;
            
                include 'public/views/dashboard.html';
                break;
            default:
                include 'public/views/404.html';
                break;
        }
    }
}

?>