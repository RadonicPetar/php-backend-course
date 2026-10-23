<?php

namespace Singleton\Core;

class Config{
    private static ?Config $instance = null;
    private array $settings = [];

    private function __construct(){
        $this->settings=[
            "app_name" => "Moja aplikacija",
            "version" => "1.0"
        ]; 
    }

    public static function getInstance(): Config
    {
        if(self::$instance===null){
            self::$instance = new Config();
        }

        return self::$instance;
    }

    public function getKey(string $key): mixed{
        return $this->settings[$key] ?? null;
    }
}