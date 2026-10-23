<?php

namespace TDDProjekt;

use PDO;

class KategorijaRepository{
    public function create(string $naziv, string $opis): int{
        $pdo = Database::connect();
        $sql = "INSERT into kategorije (naziv,opis) values (:naziv,:opis)";
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            "naziv"=>$naziv,
            "opis"=>$opis
        ]);

        return (int)$pdo->lastInsertId();
    }

    public function findAll(): array{
        $pdo=Database::connect();
        $sql="SELECT * FROM kategorije";

        $stmt=$pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete(int $id): bool{
        $pdo = Database::connect();
        $sql = "DELETE from kategorije WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['id'=>$id]);
    }

    public function delete_existing(int $id): bool{
        $pdo = Database::connect();
        $sql = "DELETE from kategorije WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id'=>$id]);

        return $stmt->rowCount()>0;
    }

    public function findById(int $id): ?array{
        $pdo = Database::connect();
        $sql = "SELECT * from kategorije WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id'=>$id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ?: null;
    }

    public function update(int $id,string $naziv,string $opis): bool{
        $pdo = Database::connect();
        $sql = "UPDATE kategorije SET naziv=:naziv,opis=:opis  WHERE id=:id";
        $stmt = $pdo->prepare($sql);

        return $stmt->execute([
            "id"=>$id,
            "naziv"=>$naziv,
            "opis"=>$opis
        ]);
    }

    public function kategorijeIstogNaziva(string $naziv): bool{
        $pdo = Database::connect();
        $sql = "SELECT count(*) as ukupno from kategorije where naziv = :naziv";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['naziv'=>$naziv]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result["ukupno"] > 3;
    }
    
    public function exportJson(array $data, string $putanja): void{
        file_put_contents($putanja,json_encode($data,JSON_PRETTY_PRINT));
    }

}