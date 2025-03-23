<?php

class Database{

    public static $connection;

    public static function setUpConnection(){

        if (!isset(Database::$connection)) {
            Database::$connection = new mysqli("localhost", "root", "tharinduCHA@8754", "java_assignment", "3306");
        }
    }

    public static function insUpdelete($query){

        Database::setUpConnection();
        Database::$connection->query($query);
    }

    public static function search($query){

        Database::setUpConnection();
        $resultset = Database::$connection->query($query);
        return $resultset;
    }
}
?>