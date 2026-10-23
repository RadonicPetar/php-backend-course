<?php

namespace Observers\Primjer1;

use Observers\Contracts\ObserverInterface;

class UserObserver implements ObserverInterface{
    public function update(string $message): void{
        echo "User observer: ".$message."<br>";
    }
}