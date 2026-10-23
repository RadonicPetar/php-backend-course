<?php

namespace Observers\Primjer2;

use Observers\Contracts\ObserverInterface;

class SMSObserver implements ObserverInterface{
    public function update(string $message): void{
        echo "SMS: ".$message."<br>";
    }
}