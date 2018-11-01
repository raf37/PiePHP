<?php

class ORM extends Database
{
    /**
     * @param $table
     * @param $fields
     * @return mixed
     * insert utilisateur in bdd et retourne id de l'utilsateur qui viens de se register
     */
    public function create($table, $fields)
    {
        $column = "";
        $valueParam = "";
        $arrayValue = [];
        $i = 1;
        foreach ($fields as $key => $value) {
            $column .= $key;
            $valueParam .= "?";
            array_push($arrayValue, $value);
            if ($i != count($fields)) {
                $column .= ", ";
                $valueParam .= ", ";
            }
            $i++;
        }
        $sql = "INSERT INTO $table ($column) VALUES ($valueParam)";
        $insert = $this->bdd->prepare($sql);
        $insert->execute($arrayValue);
        $arrayColumn = explode(", ", $column);
//        var_dump($sql);
        $sql = "SELECT id_perso FROM $table WHERE ";
        $i = 1;
        foreach ($arrayColumn as $columnName) {
            $sql .= $columnName . " = ? ";
            if ($i != count($fields)) {
                $sql .= "AND ";
            }
            $i++;
        }
//        echo $sql;
        $selectID = $this->bdd->prepare($sql);
        $selectID->execute($arrayValue);
//        var_dump($selectID);
//        var_dump($sql);
        $result = $selectID->fetchAll(PDO::FETCH_ASSOC);
//        var_dump($result);
        $insert->closeCursor();
        return $result[0]["id_perso"];
    }

    /**
     * @param $table
     * @param $id
     * @return mixed
     */
    public function read($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE id_perso = '$id'";

        $insert = $this->bdd->prepare($sql);
        $insert->execute();
        $result = $insert->fetchAll(PDO::FETCH_ASSOC);
//        var_dump($result);
//        echo $sql;
        foreach ($result as $element) {
            echo "<pre>";
            $readInfos = print_r($element);
            echo "</pre>";
        }
        $insert->closeCursor();
        return $readInfos; // retourne un tableau associatif de l'enregistrement
    }

    /**
     * @param $table
     * @return mixed
     */
    public function readAll($table)
    {
        $sql = "SELECT * FROM $table";
        $insert = $this->bdd->prepare($sql);
        $insert->execute();
        $result = $insert->fetchAll(PDO::FETCH_ASSOC);
//        var_dump($result);
        foreach ($result as $element) {
            echo "<pre>";
            $readInfos = print_r($element);
            echo "</pre>";
        }
        $insert->closeCursor();
        return $readInfos; // retourne un tableau associatif de l'enregistrement
    }

    /**
     * @param $table
     * @param $id
     * @param $fields
     */
    public function update($table, $id, $fields)
    {
        $param = "";
        $arrayValue = [];
        $i = 1;
        foreach ($fields as $key => $value) {
            $param .= $key ." = ?";
            array_push($arrayValue, $value);
            if ($i != count($fields)) {
                $param .= ", ";
            }
            $i++;
        }
        $sql = "UPDATE $table SET $param WHERE id_perso = '$id'";
//        echo $sql;
        $insert = $this->bdd->prepare($sql);
        $insert->execute($arrayValue);
        $insert->closeCursor(); // retourne un booléen
    }

    /**
     * @param string $table
     * @param int    $id
     */
    public function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id_perso = '$id'";
        echo $sql;
        $insert = $this->bdd->prepare($sql);
        $insert->execute();
        $insert->closeCursor();
    }
    // retourne un booléen

    /**
     * @param $table
     * @param array $params
     * @return array
     */
    public function find($table, $params = array(
    'WHERE' => '1',
    'ORDER BY' => 'id ASC',
    'LIMIT' => '1'
    ))
    {
        $sql = "SELECT * FROM " . $table;
        foreach ($params as $key => $value) {
            $sql .= " $key" . " $value";
        }
//        echo $sql;
//        var_dump($params);
        $insert = $this->bdd->prepare($sql);
        $insert->execute();
//        var_dump($sql);
        $result = $insert->fetchAll(PDO::FETCH_ASSOC);
        $insert->closeCursor();
        return $result;
    }
}
