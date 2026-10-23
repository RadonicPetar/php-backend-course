<?php

namespace TDDProjekt\Tests;

use PDO;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use TDDProjekt\Database;

class DatabaseConnectionTest extends TestCase
{
    #[Test]
    public function konekcija_na_bazu_radi(): void{
        $pdo = Database::connect();

        $this->assertInstanceOf(PDO::class,$pdo);
    }
}