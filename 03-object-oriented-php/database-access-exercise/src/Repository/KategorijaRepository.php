<?php

namespace Repository;

use Database\Database;
use Models\Kategorija;
use Exception;

class KategorijaRepository{
    private $connection;

    public function __construct(){
        $this->connection = Database::getInstance()->getConnection();
    }

    public function getAll(): array{
        $sql = "SELECT * FROM kategorije";
        $result = $this->connection->query($sql);

        $data = [];

        while($row = $result->fetch_assoc()){
            $data[]=$row;
        }

        return $data;
    }

    public function search(string $naziv): array{
        $sql = "SELECT * FROM kategorije where naziv like ? or opis like ?";
        $search = "%".$naziv."%";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ss",$search,$search);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = [];

        while($row = $result->fetch_assoc()){
            $data[]=$row;
        }

        return $data;
    }

    public function insert(Kategorija $kategorija): bool{
        try {
            $sql = "INSERT INTO kategorije (naziv,opis,aktivna) values (?,?,?)";
            $stmt = $this->connection->prepare($sql);
            if(!$stmt){
                throw new Exception("Priprema upita ne valja: ".$this->connection->error);               
            }
            $stmt->bind_param("ssi",$kategorija->naziv,$kategorija->opis,$kategorija->aktivna);
            if(!$stmt->execute()){
                throw new Exception("Izvršavanje upita nije uspjelo ".$stmt->error);
            }
            return true;
        } catch (Exception $ex) {
            throw new Exception("Greška kod inserta kategorija: ".$ex->getMessage());
        }
    }

    public function getById(int $id): ?array{
        try {
            $sql="SELECT * FROM kategorije WHERE id = ?";
            $stmt = $this->connection->prepare($sql);
            if(!$stmt){
                throw new Exception("Priprema upita ne valja: ".$this->connection->error);               
            }
            $stmt->bind_param("i",$id);
            $stmt->execute();

            $result = $stmt->get_result();

            return $result->fetch_assoc() ? : null;
        } catch (Exception $ex) {
            throw new Exception("Greška kod dohvata GET BY ID: ".$ex->getMessage());
        }
    }

    public function update(Kategorija $kategorija): bool{
        try {
            $sql="UPDATE kategorije SET naziv=?,opis=?,aktivna=? where id = ?";
            $stmt=$this->connection->prepare($sql);
            if(!$stmt){
                throw new Exception("Priprema upita ne valja: ".$this->connection->error);               
            }
            $stmt->bind_param("ssii",$kategorija->naziv,$kategorija->opis,$kategorija->aktivna,$kategorija->id);
            if(!$stmt->execute()){
                throw new Exception("Izvršavanje upita nije uspjelo ".$stmt->error);
            }
            return true;
            } catch (Exception $ex) {
            throw new Exception("Greška kod UPDATE KATEGORIJE: ".$ex->getMessage());
        }
    }

    public function delete(int $id): bool{
        try {
            $sql="DELETE FROM kategorije WHERE id = ?";
            $stmt=$this->connection->prepare($sql);
            if(!$stmt){
                throw new Exception("Priprema upita ne valja: ".$this->connection->error);               
            }
            $stmt->bind_param("i",$id);
            if(!$stmt->execute()){
                throw new Exception("Izvršavanje upita nije uspjelo ".$stmt->error);
            }
            return true;
        } catch (Exception $ex) {
            throw new Exception("Greška kod DELETE KATEGORIJE: ".$ex->getMessage());
        }
    }
}