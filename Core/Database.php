<?php

class Database
{
    public $bdd;

    public function __construct()
    {
        $bdd = new PDO('mysql:host=127.0.0.1; dbname=epitech_tp', 'root', 'pandaporc37');
//        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->bdd = $bdd;
    }

}
//$reqdb = new Database();
?>

