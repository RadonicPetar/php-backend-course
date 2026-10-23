<?php

namespace Singleton\Core;

use Exception;
use mysqli;

class Database{

    private static ?Database $instance = null;
    private mysqli $connection;

    private function __construct(){
        try{
            $host="localhost";
            $user="root";
            $password="";
            $database="test";

            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

            $this->connection = new mysqli($host,$user,$password,$database);
            $this->connection->set_charset("utf8mb4");


        }
        catch(Exception $e){
            throw new Exception("Nije moguće uspostaviti vezu s bazom podataka! Provjerite paramete");
        }
    }

    public static  function getInstance() : Database {
        if(self::$instance===null){
            self::$instance=new Database();
        }

        return self::$instance;
    }

    public function getConnection(): mysqli{
        return $this->connection;
    }

    private function __clone(){

    }

    public function __destruct(){
        $this->connection->close();
        echo "Konekcija zatvorena";
    }
}