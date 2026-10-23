<?php

abstract class AbsProvjera{

    protected static string $basePath = __DIR__."/storage/";

    protected static string $fileName;
    abstract static function ProvjeriPostojanje(): void;

    protected static function getPutanja(): string{
        
        return static::$basePath . static::$fileName;
    }
}