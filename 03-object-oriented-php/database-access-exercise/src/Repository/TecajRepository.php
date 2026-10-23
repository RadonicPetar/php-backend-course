<?php

namespace Repository;

use Database\PdoMsSqlDatabase;


use PDO;
use PDOException;


class TecajRepository{
    private PDO $connection;

    public function __construct(){
        $this->connection = PdoMsSqlDatabase::getInstance()->getConnection();
    }

    public function getAll(): array{
        try {
            $sql="SELECT * FROM dbo.tecaj";
             $stmt = $this->connection->prepare($sql);
             $stmt->execute();
             return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            throw new PDOException("PDO select greška: ".$ex->getMessage());
        }
    }


}