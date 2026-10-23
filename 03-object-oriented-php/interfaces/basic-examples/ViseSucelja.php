<?php

interface Ispis{
    public function ispisi(): string;
}

interface Izracun{
    public function BrojZnakova(): int;
}

interface Spremanje{
    public function spremi(): void;
}

interface IzracunPoreza{
    public function izracunajPorez(): float;
}