<?php

namespace Repository;

use Database\PdoDatabase;

use Models\Proizvod;

use PDO;
use PDOException;


class ProizvodRepository{
    private PDO $connection;

    public function __construct(){
        $this->connection = PdoDatabase::getInstance()->getConnection();
    }

    public function getAll(): array{
        try {
            $sql="SELECT proizvodi.*, kategorije.naziv as kategorija FROM proizvodi INNER JOIN kategorije
             ON proizvodi.kategorijaid = kategorije.id ORDER BY proizvodi.id DESC";
             $stmt = $this->connection->prepare($sql);
             $stmt->execute();
             return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            throw new PDOException("PDO select greška: ".$ex->getMessage());
        }
    }

    public function countAll(): int{
        $sql="SELECT COUNT(*) AS total FROM proizvodi";
        $stmt=$this->connection->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return (int)$row["total"];
    }

    public function getPaginated(int $limit, int $offset): array{
        $sql="SELECT proizvodi.*, kategorije.naziv as kategorija FROM proizvodi INNER JOIN kategorije
             ON proizvodi.kategorijaid = kategorije.id ORDER BY proizvodi.id DESC LIMIT :limit OFFSET :offset";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(":limit",$limit,PDO::PARAM_INT);
        $stmt->bindValue(":offset",$offset,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert(Proizvod $proizvod): bool{
        try {
            $sql="INSERT INTO proizvodi (naziv,kolicina,cijena,kategorijaid) VALUES 
            (:naziv,:kolicina,:cijena,:kategorijaid)";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(":naziv",$proizvod->naziv,PDO::PARAM_STR);
            $stmt->bindValue(":kolicina",$proizvod->kolicina,PDO::PARAM_INT);
            $stmt->bindValue(":cijena",$proizvod->cijena,PDO::PARAM_STR);
            $stmt->bindValue(":kategorijaid",$proizvod->kategorijaid,PDO::PARAM_INT);
            return $stmt->execute();
            } 
            catch (PDOException $ex) {
                throw new PDOException("PDO insert greška: ".$ex->getMessage());
        }
    }

    public function getById(int $id): ?array{
        try {
            $sql ="SELECT * FROM proizvodi where id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(":id",$id,PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ? : null;
        }catch (PDOException $ex) {
                throw new PDOException("PDO GET BY ID greška: ".$ex->getMessage());
        }
    }

    public function update(Proizvod $proizvod): bool{
        try {
            $sql="UPDATE proizvodi set naziv = :naziv, kolicina=:kolicina, cijena=:cijena,kategorijaid=:kategorijaid
             WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(":naziv",$proizvod->naziv,PDO::PARAM_STR);
            $stmt->bindValue(":kolicina",$proizvod->kolicina,PDO::PARAM_INT);
            $stmt->bindValue(":cijena",$proizvod->cijena,PDO::PARAM_STR);
            $stmt->bindValue(":kategorijaid",$proizvod->kategorijaid,PDO::PARAM_INT);
            $stmt->bindValue(":id",$proizvod->id,PDO::PARAM_INT);
            return $stmt->execute();
            } 
            catch (PDOException $ex) {
                throw new PDOException("PDO insert greška: ".$ex->getMessage());
        }
    }

    public function delete(int $id): bool{
        try{
            $sql = "DELETE from proizvodi where id=:id";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(":id",$id,PDO::PARAM_INT);
            return $stmt->execute();
        }
        catch (PDOException $ex) {
                throw new PDOException("PDO delete greška: ".$ex->getMessage());
        }
    }
}