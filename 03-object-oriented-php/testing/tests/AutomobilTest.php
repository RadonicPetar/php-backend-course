<?php

namespace TDDProjekt\Tests;


use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use TDDProjekt\Automobil;
use TDDProjekt\Gorivo;

class AutomobilTest extends TestCase{

    #[Test]
    public function automobil_se_moze_kretati(): void{
        $automobil = new Automobil(
            "VIN123","Audi","A4",2020,100000,Gorivo::DIZEL
        );

    $this->assertInstanceOf(Automobil::class,$automobil);
    }

    #[Test]
    public function marka_automobila_je_ispravna(): void{
        $automobil = new Automobil(
            "VIN234",
            "BMW",
            "x5",
            2022,
            100000,Gorivo::STRUJA
        );
        $this->assertEquals("BMW",$automobil->getMarka());
    }

    #[Test]
    public function godina_ne_moze_biti_manja_od_1886(): void{
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Godina automobila nije ispravna");

        new Automobil("VIN123","Audi","A4",1700,100000,Gorivo::DIZEL);
    }

    #[Test]
    public function registracija_je_po_defaultu_null(): void{
        $automobil = new Automobil(
            "VIN234",
            "BMW",
            "x5",
            2022,
            100000,Gorivo::STRUJA
        );

        $this->assertNull($automobil->getRegistracija());
    }

    #[Test]
    public function registracija_nije_null(): void{
        $automobil = new Automobil(
            "VIN234",
            "BMW",
            "x5",
            2022,
            100000,Gorivo::STRUJA,"ZG123AB"
        );

        $this->assertNotNull($automobil->getRegistracija());
    }

    #[Test]
    public function automobil_sadrzi_klimu_u_opremi(): void{
        $automobil = new Automobil(
            "VIN234",
            "BMW",
            "x5",
            2022,
            100000,Gorivo::STRUJA,"ZG123AB"
        );

        $automobil->dodajOpremu("Klima");
        $this->assertContains("Klima",$automobil->getOprema());
        $this->assertNotContains("Navigacija",$automobil->getOprema());
    }

    #[Test]
    public function oprema_je_prazna_na_pocetku(): void{
        $automobil = new Automobil(
            "VIN234",
            "BMW",
            "x5",
            2022,
            100000,Gorivo::STRUJA,"ZG123AB"
        );

        $this->assertEmpty($automobil->getOprema());
        $automobil->dodajOpremu("Klima");
        $this->assertNotEmpty($automobil->getOprema());
    }

    #[Test]
    public function kilometri_su_veci_od_nule(): void{
        $auto = new Automobil(
            "VIN234",
            "BMW",
            "x5",
            2022,
            100000,Gorivo::STRUJA,"ZG123AB"
        );

        $this->assertGreaterThan(0,$auto->getKilometri());
        $this->assertLessThan(50,$auto->getStarost());
    }

    #[Test]
    public function automobili_sa_istim_vinom_su_isti(): void{
        $auto1 = new Automobil(
            "VIN234",
            "BMW",
            "x5",
            2022,
            100000,Gorivo::STRUJA,"ZG123AB"
        );

        $auto2 = new Automobil(
            "VIN234",
            "Audi",
            "A6",
            2021,
            250000,Gorivo::HIBRID,"ZG456AB"
        );

        $this->assertTrue($auto1->istiAutomobil($auto2));
    }

    //napraviti validan test koji očekuje da registracija počinje za ZG (koristiti assertion assertStringStartsWith)
    #[Test]
    public function registracija_pocinje_sa_ZG(): void
    {
       $auto = new Automobil(
            "VIN234",
            "Audi",
            "A6",
            2021,
            250000,Gorivo::HIBRID,"ZG456AB"
        );

   $this->assertStringStartsWith(
        "ZG",
        $auto->getRegistracija()
    );
    }

    #[Test]
    public function oprema_ima_dvije_stavke(): void{
               $auto = new Automobil(
            "VIN234",
            "Audi",
            "A6",
            2021,
            250000,Gorivo::HIBRID,"ZG456AB"
        );

        $auto->dodajOpremu("Klima");
        $auto->dodajOpremu("Navigacija");
        $this->assertCount(2,$auto->getOprema());
    }

    
    #[Test]
    public function registracija_ima_ispravan_format(): void{
        $auto = new Automobil(
            "VIN234",
            "Audi",
            "A6",
            2021,
            250000,Gorivo::HIBRID,"ZG456AB"
        );

        $this->assertMatchesRegularExpression(
            '/^[A-Z]{2}[0-9]{3}[A-Z]{2}$/',$auto->getRegistracija()
            );
    }

    //napraviti test za istu marku automobila i isto mjesto (iz registracije)

}