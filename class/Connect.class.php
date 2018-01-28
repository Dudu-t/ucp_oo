<?php
/**
 * Created by PhpStorm.
 * User: Dudut
 * Date: 28/01/2018
 * Time: 16:32
 */

namespace page;


class Connect
{
public $stmt;
public $conn;
    public function query($query)
    {
        $this->conn = new \PDO("mysql:host=localhost;dbname=scrp", "root", "");
        $this->stmt = $this->conn->query($query);
        return $this->stmt->fetchAll( \PDO:: FETCH_ASSOC);
    }



}