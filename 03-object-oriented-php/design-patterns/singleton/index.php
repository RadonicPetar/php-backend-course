<?php

require_once "bootstrap.php";

use Singleton\Core\Database;
use Singleton\Core\Logger;
use Singleton\Core\Config;
use Singleton\Core\Counter;
use Singleton\Core\FileLogger;
use Singleton\Core\SessionManager;
use Singleton\Core\StudentLogger;

echo "<h2>Primjer 1</h2>";

$log1 = Logger::getInstance();
$log2 = Logger::getInstance();

$log1->log("Prva poruka");
$log2->log("Druga poruka");

echo "<h2>Primjer 2</h2>";

$config = Config::getInstance();
echo $config->getKey("app_name")."<br>";
echo $config->getKey("version")."<br>";

echo "<h2>Primjer 3</h2>";

$c1 = Counter::getInstance();
$c2 = Counter::getInstance();

$c1->increment();
$c1->increment();

echo $c2->getCount();

echo "<h2>Primjer 4</h2>";

$logger = FileLogger::getInstance();

$logger->logiraj("Student je spremljen");
$logger->logiraj("Knjiga je spremljena");

echo "Log je zapisan";

echo "<h2>Primjer 5</h2>";

$session = SessionManager::getInstance();
$session->set("ime","Marko");
echo $session->get("ime");
echo $session->get("prezime");

//napraviti klasu StudentLogger kao singleton, te unutar nje metodu logStudent koja će primiti naziv studenta,
//te vratiti poruku Student Marko je upisan. Dodatno ispisati vrijeme u milisekundama.

echo "<h2>Primjer 6</h2>";



try{
    $studlogger = StudentLogger::getInstance();
    $studlogger->logStudent("Perica");
    $studlogger->logStudent("Marica");
    $studNoviLogger = clone $studlogger;
    $studNoviLogger->logStudent("Ivica");
}
catch(Exception $e){
    echo "Greška: ".$e->getMessage();
}

echo "<h2>Primjer 7</h2>";

try {
    $db = Database::getInstance();
    $conn = $db->getConnection();
    echo "<br>Uspješno spajanje na bazu";
} catch (Exception $e) {
    echo "Greška: ".$e->getMessage();
}