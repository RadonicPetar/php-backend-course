<?php

namespace Models;

use Interfaces\JsonSerializableInteface;

class Narudzba implements JsonSerializableInteface{

    public function __construct(
        public int $id,
        public string $datum_narudzbe,
        public int $kolicina,
        public int $kupacid,
        public int $vrstaid,
        public string $vrsta
    )
    {

    }

    public function toArray(): array{
        return [
            "id"=>$this->id,
            "datum_narudzbe"=>$this->datum_narudzbe,
            "kolicina"=>$this->kolicina,
            "kupacid"=>$this->kupacid,
            "vrstaid"=>$this->vrstaid,
            "vrsta"=>$this->vrsta
        ];
    }
}