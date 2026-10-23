<?php

namespace Database;

use PDO;
use PDOException;

class PdoMsSqlDatabase
{
    private static ?PdoMsSqlDatabase $instance = null;
    private PDO $connection;

    private function __construct(){
        $dsn="sqlsrv:Server=MIKS01\\SQLEXPRESS;Database=eduka";
        $user="eduka_user";
        $pass="Lozinka123!";
        try {
            $this->connection = new PDO(
                $dsn,
                $user,
                $pass
            );

            $this->connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        } catch (PDOException $ex) {
            die("PDO greška: ".$ex->getMessage());
        }
    }

    public static function getInstance(): PdoMsSqlDatabase{
        if(self::$instance === null){
            self::$instance = new PdoMsSqlDatabase();
        }
        return self::$instance;
    }

    public function getConnection(): PDO{
        return $this->connection;
    }
}

// $db=PdoMsSqlDatabase::getInstance();
// $conn = $db->getConnection();
// echo "<br>PDO konekcija uspješna";