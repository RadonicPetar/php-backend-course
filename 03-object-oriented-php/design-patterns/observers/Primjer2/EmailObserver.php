<?php

namespace Observers\Primjer2;

use Observers\Contracts\ObserverInterface;

class EmailObserver implements ObserverInterface{
    public function update(string $message): void{
        echo "EMAIL ".$message."<br>";
    }
}