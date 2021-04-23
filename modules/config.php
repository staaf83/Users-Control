<?php class Config {
    public $conn;

    function __construct($host='localhost', $user='root', $pass='', $db='users') {
        $this->conn=new mysqli($host, $user, $pass, $db);
    }
}