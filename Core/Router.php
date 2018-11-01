<?php

class Router
{
    private static $routes;

    public static function connect($url, $route)
    {
        self::$routes[$url] = $route;
    }

    public static function get($url)
    {
        if (!isset(self::$routes[$url])) {
            return(['controller' => 'error', 'action' => 'error']); // pop form pour login
        }
        return self::$routes[$url];
    }
}
