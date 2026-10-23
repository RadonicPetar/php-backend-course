<?php

namespace Factory\Model;

class IzvanredniStudent extends Student{
    public function info(): string{
        return "Izvanredni student {$this->ime}";
    }
}