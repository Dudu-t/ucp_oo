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
    private $host = "";
    private $usuario = "root";
    private $senha = "";
    private $db = "scrp";
    public function query($query)
    {
        $this->conn = new \PDO("mysql:host=$this->host;dbname=$this->db", "$this->usuario", "$this->senha");
        $this->stmt = $this->conn->query($query);
        return $this->stmt->fetchAll( \PDO:: FETCH_ASSOC);
    }
    public function exec($query){
        $this->conn = new \PDO("mysql:host=$this->host;dbname=$this->db", "$this->usuario", "$this->senha");
        $this->stmt = $this->conn->exec($query);
        return 1;
    }


}