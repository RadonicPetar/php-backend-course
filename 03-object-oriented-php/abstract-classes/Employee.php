<?php

/*
1. Kreirati apstraktnu klasu Employee

Klasa treba sadržavati sljedeća svojstva:

ime
prezime
naziv radnog mjesta
godina rođenja

Napraviti konstruktor koji postavlja sve podatke.

U klasi definirati metode
CalculateSalary() – apstraktna metoda za izračun plaće
IzracunBonusa() – apstraktna metoda za izračun bonusa
GetEmployeeInfo() – metoda koja ispisuje osnovne podatke zaposlenika

Napraviti klasu RegularEmployee

Klasa nasljeđuje Employee.

Potrebno je:

implementirati metode za 
izračun plaće i 
bonusa (ako titula sadrži dio "Employee" bonus je 1000, te dodatno ako je osoba stara između 30 i 50 onda je dodatnh 500)
napraviti metodu za ispis svih podataka

Napraviti klasu ManagerEmployee

Klasa također nasljeđuje Employee.

Potrebno je:

implementirati metode za
izračun plaće i 
bonusa (ako titula sadrži dio "Manager" bonus je 3000, te dodatno ako je osoba starija od 50 onda je dodatnih 500 do 2000)
napraviti posebnu metodu za ispis podataka
*/

abstract class Employee{

    protected string $firstName;
    protected string $lastName;
    protected string $jobTitle;
    protected int $godiste;

    public function __construct(string $fName, string $lName, string $jTitle, int $god){
        $this->firstName = $fName;
        $this->lastName = $lName;
        $this->jobTitle = $jTitle;
        $this->godiste = $god;
    }

    abstract public function CalculateSalary();
    abstract public function IzracunBonusa();

    public function GetEmployeeInfo(){
        echo "<p>Employee {$this->firstName}, {$this->lastName}, {$this->jobTitle}, {$this->godiste}";
    }
}

class RegularEmployee extends Employee{

    public function CalculateSalary() {
        return 2500;
    }

    public function IzracunBonusa(){
        $godina = date("Y")-$this->godiste;

        if(str_contains($this->jobTitle,"Employee")){
            $bonus = 1000;
        }

        //dodatni uvjet za godine
        if($godina > 30 && $godina < 50){
            $bonus+=500;
        }

        return $bonus;
    }

    public function GetAllInfo(){
        $this->GetEmployeeInfo();
        echo "<p>Plaća: {$this->CalculateSalary()}</p>";
        echo "<p>Bonus: {$this->IzracunBonusa()}</p>";
        echo "<p>Ukupno: ".$this->CalculateSalary()+$this->IzracunBonusa()."</p>";
    }
}

class ManagerEmployee extends Employee{

    private bool $sluzbeniAuto;
    public function CalculateSalary() {
        return 3500;
    }

    public function __construct(string $fName, string $lName, string $jTitle, int $god){
        parent::__construct( $fName,  $lName,  $jTitle,  $god);
        $this->sluzbeniAuto=false;
    }

    public function IzracunBonusa(){
            $godina = date("Y")-$this->godiste;

        if(str_contains($this->jobTitle,"Manager")){
            $bonus = 3000;
        }

        //dodatni uvjet za godine
        if($godina > 30 && $godina < 50){
            $bonus+=rand(500,2000);
        }

        if($this->sluzbeniAuto){
            $bonus+=200;
        }

        return $bonus;
    }

    public function GetAllInfo(){
        $this->GetEmployeeInfo();
        echo "<p>Plaća: {$this->CalculateSalary()}</p>";
        echo "<p>Bonus: {$this->IzracunBonusa()}</p>";
        echo "<p>Ukupno: ".$this->CalculateSalary()+$this->IzracunBonusa()."</p>";
        echo $this->sluzbeniAuto ? "Vozi službeni auto" : "Nema službeni auto";
    }
}

$emp1 = new RegularEmployee("Ana","Anic","Mid Employee",1992);
$emp1->GetAllInfo();

$emp2 = new ManagerEmployee("Tomo","Tomic","Line Manager",1980);
$emp2->GetAllInfo();