<?php

namespace Models;

use Abstracts\BaseModel;

class Proizvod extends BaseModel{

    public function __construct(
        int $id, 
        public string $naziv, 
        public int $kolicina, 
        public float $cijena, 
        public int $kategorijaid
        )
        {
            parent::__construct($id);
        }

        public function toArray(): array{

            return [
                "id"=>$this->id,
                "naziv"=>$this->naziv,
                "kolicina"=>$this->kolicina,
                "cijena"=>$this->cijena,
                "kategorijaid"=>$this->kategorijaid
            ];
        }

}