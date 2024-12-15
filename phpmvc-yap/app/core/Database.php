<?php

class Database
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->setConnect();
    }

    public function query($query, $params = array())
    {
        $stsmt = $this->conn->prepare($query);
        $stsmt->execute($params);
        return $stsmt;
    }

    public function setConnect()
    {
        try {
            $host = DB_HOST;
            $user = DB_USER;
            $pass = DB_PASS;
            $db = DB_NAME;
            $port = DB_PORT;
            $option = [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ];
            $this->conn = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass, $option);
            return $this->conn;
        } catch (\Throwable $e) {
            die($e->getMessage());
        }
    }

}