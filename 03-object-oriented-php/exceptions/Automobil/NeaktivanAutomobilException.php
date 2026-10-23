<?php

class NeaktivanAutomobilException extends Exception{
    private string $nazivAuta;

    public function __construct(string $nazivAuta){
        $this->nazivAuta = $nazivAuta;
        parent::__construct("Automobil {$nazivAuta} nije aktivan!");
    }

    public function getNazivAuta(): string{
        return $this->nazivAuta;
    }
}