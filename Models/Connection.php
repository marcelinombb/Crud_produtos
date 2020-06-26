<?php
namespace Models;
use PDO;

class Connection{
    private static $conn;

    public static function conn(){
        self::$conn = new PDO("mysql:host=localhost;dbname=crudprod","root","");
        self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$conn->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        return self::$conn;
    }

}