<?php

namespace Models;

use Abstracts\BaseModel;

class Kategorija extends BaseModel{

    public function __construct(int $id,public string $naziv,public string $opis, public bool $aktivna){
            parent::__construct($id);
    }
    
    public function toArray(): array{
            return [
                "id"=>$this->id,
                "naziv"=>$this->naziv,
                "opis"=>$this->opis,
                "aktivna"=>$this->aktivna
            ];
    }
}