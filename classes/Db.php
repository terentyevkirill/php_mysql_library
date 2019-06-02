<?php

class Db
{
    protected function connect()
    {
        //connection to db
        $servername = "localhost";
        $dbname = "bookby";
        $username = "root";
        $password = "";

        try {
            $dbconn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbconn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}

?>