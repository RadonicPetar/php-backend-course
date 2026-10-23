<?php

namespace TDDProjekt\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use TDDProjekt\Calculator;

class CalculatorTest extends TestCase{

    #[Test]
    public function zbranjanje_dva_broja_radi_ispravno(): void{
        $calculator = new Calculator();
        $result = $calculator->add(2,3);
        $this->assertEquals(5,$result);
    }

    #[Test]
    public function oduzimanje_brojeva_radi_ispravno(): void{
        $calculator = new Calculator();
        $result = $calculator->substract(20,15);
        $this->assertEquals(5,$result);
    }

    #[Test]
    public function mnozenje_brojeva_radi_ispravno(): void{
        $calculator = new Calculator();
        $result = $calculator->mulitply(20,10);
        $this->assertEquals(200,$result);
    }

    #[Test]
    public function dijeljenje_brojeva_radi_ispravno(): void{
        $calculator = new Calculator();
        $result = $calculator->divide(20,10);
        $this->assertEquals(2,$result);
    }

    #[Test]
    public function modulo_brojeva_radi_ispravno(): void{
        $calculator = new Calculator();
        $result = $calculator->modulo(10,3);
        $this->assertEquals(1,$result);
    }

    #[Test]
    public function dijeljenje_s_nulom_baca_exception(): void{
        $calculator = new Calculator();
        $this->expectException(InvalidArgumentException::class);

        $this->expectExceptionMessage("Dijeljenje s nulom nije dozvoljeno.");

        $calculator->divide(10,0);
    }

    #[Test]
    public function modulo_s_nulom_baca_exception(): void{
        $calculator = new Calculator();
        $this->expectException(InvalidArgumentException::class);

        $this->expectExceptionMessage("Modulo s nulom nije dozvoljeno.");

        $calculator->modulo(10,0);
    }

    #[Test]
    public function korijen_broja(): void{
        $calculator = new Calculator();
        $res = $calculator->korijen(25);
        //$this->assertEquals("5",$res);
        $this->assertSame(5.0,$res);
    }
}