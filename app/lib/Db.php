<?php

namespace App\lib;

use PDO;

class Db
{
    public PDO $PDO;
    private string $host;
    private string $dbname;
    private string $username;
    private string $password;
    private string $dsn;

    function __construct()
    {
        $this->host = "localhost";
        $this->dbname = "enot";
        $this->username = "root";
        $this->password = "";
        $this->dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4;";


        $this->PDO = new PDO($this->dsn, $this->username, $this->password);
        $this->PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}