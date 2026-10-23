<?php

namespace TDDProjekt;

use PDO;

class Database{
    public static function connect(): PDO
    {
        return new PDO(
            "mysql:host=localhost;dbname=tdd_baza;charset=utf8","root",""
            );
    }
}