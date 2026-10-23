<?php

class StudentKonst{

    private string $ime;
    private string $prezime;
    private string $jmbag;

    public function __construct(
        string $ime,
        string $prezime,
        string $jmbag
    )
    {
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->jmbag = $jmbag;
    }

    public function getPunoIme(): string{
        return $this->ime." ".$this->prezime;
    }

     public function getJmbag(): string{
        return $this->jmbag;
    }   
}

$student = new StudentKonst("Marko","Maric","S001");

echo $student->getPunoIme();
echo "<br>";
echo $student->getJmbag();