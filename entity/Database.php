<?php

class Database
{
    public PDO $db;

    public function __construct(){
        $username = 'root';
        $password = 'root';
        $host = 'localhost';
        $dbname = 'diagnostic';
        $this->db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    }
}