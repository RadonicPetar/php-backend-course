<?php

namespace App\Services;

class Notifier{
    public function sendNotification($message): void{
        echo "<br>Slanje notifikacije {$message}";
    }
}