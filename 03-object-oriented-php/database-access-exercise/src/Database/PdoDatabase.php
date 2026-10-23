<?php

namespace Database;

use PDO;
use PDOException;

class PdoDatabase
{
    private static ?PdoDatabase $instance = null;
    private PDO $connection;

    private function __construct(){
        try {
            $this->connection = new PDO(
                "mysql:host=localhost;dbname=webshop_db;charset=utf8mb4",
                "webshopdb",
                "Test123!"
            );

            $this->connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        } catch (PDOException $ex) {
            die("PDO greška: ".$ex->getMessage());
        }
    }

    public static function getInstance(): PdoDatabase{
        if(self::$instance === null){
            self::$instance = new PdoDatabase();
        }
        return self::$instance;
    }

    public function getConnection(): PDO{
        return $this->connection;
    }
}

// $db=PdoDatabase::getInstance();
// $conn = $db->getConnection();
// echo "<br>PDO konekcija uspješna";