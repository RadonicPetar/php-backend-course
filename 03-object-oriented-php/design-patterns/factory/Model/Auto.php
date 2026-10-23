<?php

namespace Factory\Model;

class Auto{
    private string $marka;

    public function __construct(string $marka){
        $this->marka = $marka;
    }

    public function getMarka(): string{
        return $this->marka;
    }
}