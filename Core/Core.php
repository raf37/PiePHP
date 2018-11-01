<?php

namespace Core;

class Core
{
    public $url;

    public function run()
    {
//
        include 'routes.php';

        $url = str_replace(BASE_URI, '', $_SERVER['REQUEST_URI']);
//        var_dump($url);

        $listController = \Router::get($url);
        $controllerName = ucfirst($listController['controller']) . 'Controller';
        $controller = new $controllerName;
        $controller->{$listController['action'] . 'Action'}();
    }

}
