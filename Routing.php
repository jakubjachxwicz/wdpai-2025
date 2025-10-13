<?php

class Routing 
{
    public static function route($path) 
    {
        switch ($path) 
        {
            case 'login':
                include 'public/views/login.html';
                break;
            case 'dashboard':
                include 'public/views/dashboard.html';
                break;
            default:
                include 'public/views/404.html';
                break;
        }
    }
}

?>