<?php

namespace TDDProjekt;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class KategorijaRepositoryTest extends TestCase
{
    #[Test]
    public function kategorija_se_moze_unijeti(): void{
        $repo = new KategorijaRepository();
        $id = $repo->create(
            "Mobiteli",
            "Pametni telefoni ".date("d.m.Y H:i:s")
        );

        $this->assertGreaterThan(0,$id);
    }

    #[Test]
    public function dohvacanje_kategorije_radi(): void{
        $repo = new KategorijaRepository();
        $repo->create("Vrtlarstvo","Sve za dom ".date("d.m.Y H:i:s"));

        $kategorije = $repo->findAll();

        $this->assertNotEmpty($kategorije);

        $this->assertIsArray($kategorije);
    }

    #[Test]
    public function kategorija_se_moze_obrisati(): void{
        $repo = new KategorijaRepository();
        $id = $repo->create("Voće","Ovo je voće ".date("d.m.Y H:i:s"));

        $result = $repo->delete($id);

        $this->assertTrue($result);
    }

    #[Test]
    public function brisanje_nepostojece_kategorije_vraca_false(): void{
        $repo = new KategorijaRepository();
        $result = $repo->delete_existing(21);
        $this->assertFalse($result);
    }

    #[Test]
    public function kategorija_se_moze_dohvatiti_po_id(): void{
        $repo = new KategorijaRepository();
        $id = $repo->create("Povrće","Ovo je povrće ".date("d.m.Y H:i:s"));

        $kategorija=$repo->findById($id);

        $this->assertNotNull($kategorija);
        $this->assertEquals("Povrće",$kategorija["naziv"]);
    }

    //vjezba - napraviti test tako da nepostojeca kategorija može vratiti null
    #[Test]
    public function nepostojeca_kategorija_vraca_null(): void{
        $repo = new KategorijaRepository();
        $kategorija=$repo->findById(999);
        $this->assertNull($kategorija);
    }

    #[Test]
    public function kategorija_se_moze_azurirati(): void{
        $repo = new KategorijaRepository();
        $id = $repo->create("Tehnika","Ovo je tehnika ".date("d.m.Y H:i:s"));

        $result = $repo->update($id,"Tehnika UPDATED","Ovo je tehnika OPIS UPDATED");

        $this->assertTrue($result);
        $kategorija = $repo->findById($id);

        $this->assertEquals("Tehnika UPDATED",$kategorija["naziv"]);
        $this->assertEquals("Ovo je tehnika OPIS UPDATED",$kategorija["opis"]);
    }

    //primjer - napraviti test koji vraća true ako postoje više od tri kategorije istog naziva
     #[Test]
     public function vraca_true_za_vise_od_tri_kategorije_istog_naziva(): void{
        $repo = new KategorijaRepository();

        $result = $repo->kategorijeIstogNaziva("Tehnika");
        $this->assertTrue($result);
     }

    #[Test]
    public function json_export_radi_ispravno(): void{
        $repo = new KategorijaRepository();
        $repo->create("Mobiteli","Ovo je opis mobiteli ".date("d.m.Y H:i:s"));

        $data = $repo->findAll();

        $putanja = "export_kategorije.json";
        $repo->exportJson($data,$putanja);

        $this->fileExists($putanja);

        $content = file_get_contents($putanja);

        $this->assertJson($content);

        $this->assertStringContainsString("Mobiteli",$content);
    }
}