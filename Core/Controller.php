<?php

class Controller extends ORM
{

    protected static $_render;

    public function __construct()
    {
        $verif = new Request();
        $verif->verifLol();
    }

    protected function render($view, $scope = []) // doit etre appeler a la fin de l'exec du script( __destruct)
    {
        // creer un tampon de index.html et le renvoi au moment de ?= view
        extract($scope);
        $f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View',
            str_replace('Controller', '', basename(get_class($this))), $view]) . '.php';
        if (file_exists($f)) {
            ob_start();
            include($f);
            $view = ob_get_clean();
            ob_start();
            include(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', 'index']) . '.php');
            self::$_render = ob_get_clean();
//            echo 'lolilol';
        }

    }
    public function __destruct()
    {
        echo self::$_render;
    }
}
