<?php

class DB
{
    private $host = "localhost:3306";
    private $dbname = "mydata";
    private $user = "root";
    private $password = "";
    private $dbtype = "mysql";
    private $connection;

    public function __construct()
    {
        $this->connection = new pdo("$this->dbtype:host = $this->host;dbname=$this->dbname", $this->user, $this->password);
    }

    public function get_connection()
    {
        return $this->connection;
    }

    public function select($cols, $table, $condition = 1)
    {
        return $this->connection->query("select $cols from $table where $condition=1");
    }

    public function delete($table, $condition = 1)
    {
        return $this->connection->query("delete from $table where $condition");
    }

    public function insert($table, $cols)
    {
        return $this->connection->query("insert into $table set $cols");
    }
    
    
}
