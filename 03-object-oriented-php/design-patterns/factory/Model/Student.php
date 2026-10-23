<?php

namespace Factory\Model;

class Student{
    protected string $ime;
    public function __construct(string $ime){
        $this->ime = $ime;
    }

    public function getIme(): string{
        return $this->ime;
    }

    public function info(): string{
        return "Redovni student : {$this->ime}";
    }
}