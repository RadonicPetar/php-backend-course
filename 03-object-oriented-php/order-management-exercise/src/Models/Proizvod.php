<?php
namespace Models;

use Abstracts\Stavka;
use Interfaces\JsonSerializableInteface;

class Proizvod extends Stavka implements JsonSerializableInteface{
    public function toArray(): array{
        return [
            "id"=>$this->id,
            "naziv"=>$this->naziv,
            "kolicina"=>$this->kolicina,
            "cijena"=>$this->cijena,
            "vrsta"=>"proizvod"
        ];
    }
}