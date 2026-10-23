<?php

namespace App\Services;

class Mailer{
    public function sendMail(string $to, string $subject): void{
        echo "<br>OBavijest poslana korisniku {$to} s naslovom {$subject}";
    }
}