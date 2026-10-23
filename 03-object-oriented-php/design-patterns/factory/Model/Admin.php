<?php

namespace Factory\Model;

class Admin
{
    private string $ime;

    public function __construct(string $ime){
        $this->ime = $ime;
    }

    public function info(): string{
        return "AMIN: {$this->ime}";
    }
}