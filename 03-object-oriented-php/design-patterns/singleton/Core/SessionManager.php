<?php

namespace Singleton\Core;

class SessionManager{
    private static ?SessionManager $instance = null;

    private function __construct(){
        session_start();
    }

    public static function getInstance(): SessionManager{
        if(self::$instance===null){
            self::$instance = new SessionManager();
        }

        return self::$instance;
    }

    public function set(string $key, mixed $value): void{
        $_SESSION[$key]=$value;
    }

    public function get(string $key): mixed{
        return $_SESSION[$key] ?? null;
    }
}