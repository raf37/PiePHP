<?php

spl_autoload_register(function ($class) {
//    var_dump($class);
    $parts = explode('\\', $class);
//    var_dump($class);

//    var_dump($parts);
//    var_dump($class);
//    echo "toto";
//    var_dump($parts); // array 0=>Core 1=>Core user controller
    /*
     * - Controller => src/Controller/
     * - Model => src/Model/
     * - Les autres => Core/
     */
//    $lol = (strpos($class, 'ControllerController'));
//    var_dump($lol);
//    $lol2 = substr($lol, 10);
//    var_dump($lol2);

    if (strpos($class,  'Controller') > 0) {
//        var_dump($lol);
//        var_dump($class);
        include 'src/Controller/' . end($parts) . '.php';
//        var_dump($parts);

    } elseif (strpos($class, 'Model') > 0) {
        include 'src/Model/' . end($parts) . '.php';
    } else {
        include 'Core/' . end($parts) . '.php';
    }
});
