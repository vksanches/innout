<?php

class Database {
    public static function getConnection() {
        $envPatch = realpath(dirname(__FILE__) . '/../env.ini');
        $env = parse_ini_file($envPatch);
        $conn = new mysqli($env['host'], $env['username'],
            $env['password'], $env['database']);

        if($conn->connect_error) {
            die("Erros: " . $conn->connect_error);
        }
        return $conn;
    }

    public static function getResultFromQuery($sql){
        $conn =self::getConnection();
        $result= $conn->query($sql);
        $conn->close();
        return $result;
    }
}