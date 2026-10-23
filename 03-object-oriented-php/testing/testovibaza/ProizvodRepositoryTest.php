<?php
namespace TDDProjekt;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use TDDProjekt\KategorijaRepository;

class ProizvodRepositoryTest extends TestCase
{
    #[Test]
    public function proizvod_se_moze_unijeti(): void{
        $repokat = new KategorijaRepository();
        $kategorijaId = $repokat->create(
            "Laptopi",
            "Gaming laptopi ".date("d.m.Y H:i:s")
        );

        $repopr = new ProizvodRepository();

        $id=$repopr->create(
            "ASUS Rog",
            5,
            2500.00,
            $kategorijaId
        );

        $this->assertGreaterThan(0,$id);
    }

    #[Test]
    public function proizvod_s_nepostojecom_kategorijom_vraca_exception(): void{
        $repo = new ProizvodRepository();

        $this->expectException(\PDOException::class);

        $repo->create("Neispravan proizvod",2,100,999);
    }


}