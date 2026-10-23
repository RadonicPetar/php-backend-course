<?php

namespace App\Services;

class Logger{

    public function log(string $text): void{
        echo "<br>Log poruka {$text}";
    }
}