<?php

namespace Iterators\Models;

class Student{
    public function __construct(public string $ime, public int $godine){}

    public function getFullData(){
        return $this->ime.", ".$this->godine;
    }
}