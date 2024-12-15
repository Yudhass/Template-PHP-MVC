<?php

class Database
{
    var $conn;

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
            $option = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ERRMODE_EXCEPTION
            );
            $option = array(
                PDO::ATTR_PERSISTENT => true
            );
            $this->conn = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
            $this->conn->setAttribute(PDO::ERRMODE_EXCEPTION, true);
            return $this->conn;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
?>