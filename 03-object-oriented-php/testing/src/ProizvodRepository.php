<?php

namespace TDDProjekt;

use PDO;

class ProizvodRepository{
    public function create(string $naziv,int $kolicina,float $cijena,int $kategorijaId): int{
        $pdo = Database::connect();
        $sql = "INSERT INTO proizvodi (naziv,kolicina,cijena,kategorijaId) VALUES (:naziv,:kolicina,:cijena,:kategorijaId)";
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            "naziv"=>$naziv,
            "kolicina"=>$kolicina,
            "cijena"=>$cijena,
            "kategorijaId"=>$kategorijaId,
        ]);

        return (int)$pdo->lastInsertId();
    }
}