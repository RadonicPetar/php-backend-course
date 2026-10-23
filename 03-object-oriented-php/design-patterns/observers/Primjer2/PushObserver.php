<?php

namespace Observers\Primjer2;

use Observers\Contracts\ObserverInterface;

class PushObserver implements ObserverInterface{
    public function update(string $message): void{
        echo "PUSH: ".$message."<br>";
    }
}