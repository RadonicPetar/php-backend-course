<?php

namespace Models;

use Interfaces\JsonSerializableInteface;

class Pretplata implements JsonSerializableInteface{

    public function __construct(
        public int $kupacid,
        public int $proizvodid,
        public bool $pretplata
    )
    {

    }

    public function toArray(): array{
        return [

            "kupacid"=>$this->kupacid,
            "proizvodid"=>$this->proizvodid,
            "pretplata"=>$this->pretplata
        ];
    }
}