<?php

class ObicnaStudent{

    public string $ime;

    public int $godine;

    public function ispisiIme(): void{
        echo $this->ime;
    }

    public static function opis() : void {
        echo "<br>Ovo je klasa ObicnaStudent";
    }

    public static function JePunoljetan(int $godine): bool{
        return $godine >= 18;
    }
}

$student=new ObicnaStudent();
$student->ime="Marko";
$student->ispisiIme();

ObicnaStudent::opis();

if(ObicnaStudent::JePunoljetan(20)){
    echo "Punoljetan";
}