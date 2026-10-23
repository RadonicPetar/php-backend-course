<?php

interface IJsonModel{
    public function spremi(): void;
    public static function dohvatiSve(): array;
    public function getNextId(): int;
}