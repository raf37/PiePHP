<?php

class Entity
{
    public $orm;
    public $table;


    public function __construct()
    {
        // faire en sorte que le CRUDS soit accsible dans tout les model (strreplace('model'...)
//        $lol = str_replace("Model", '', $_SERVER['REQUEST_URI']);
//        var_dump($lol);
        $this->orm = new ORM();
//        foreach ($params as $key => $value) {
//            $this->$key = $value;
//        }
//        ['table' => 'users'];
    }

    public function create()
    {
//        return;
    }
}
