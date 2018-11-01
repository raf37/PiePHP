<?php

class Request
{
    public $param = [];

    public function __construct()
    {

    }

    public function verif($param) // ou param sera le param à verif
    {

            $param = trim($param);
            $param = stripslashes($param);
            $param = htmlspecialchars($param);
            return $param;
    }

    public function verifLol()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            foreach ($_GET as $value) {
                $value = $this->verif($value);
            }

        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            foreach ($_POST as $value) {
                $value = $this->verif($value);
            }
        }
    }
}
