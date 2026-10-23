<?php

namespace Database;

use Exception;
use mysqli;

class Database{

    private static ?Database $instance = null;

    private mysqli $connection;

    private function __construct(){

    try
        {
            $this->connection = new mysqli(
                "localhost",
                "webshopdb",
                "Test123!",
                "webshop_db"
            );

            if($this->connection->connect_error){
                die("Greška kod spajanja: ".$this->connection->connect_error);
            }
        }
        catch(Exception $ex){
            throw new Exception("Database konekcijska greška: ".$ex->getMessage());
        }
    }

    public static function getInstance(): Database{
        if(self::$instance===null){
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection(): mysqli{
        return $this->connection;
    }
}

// $db = Database::getInstance();

// $conn = $db->getConnection();

// echo "Konekcija uspješna";