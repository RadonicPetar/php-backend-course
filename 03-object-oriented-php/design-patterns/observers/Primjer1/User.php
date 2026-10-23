<?php

namespace Observers\Primjer1;

use Observers\Contracts\SubjectInterface;
use Observers\Contracts\ObserverInterface;

class User implements SubjectInterface{

    private array $observers = [];

    public function attach(ObserverInterface $observer): void{
        $this->observers[] = $observer;
    }

    public function detach(ObserverInterface $observer): void{

    }

    public function notify(): void{
        foreach($this->observers as $observer){
            $observer->update("Korisnik je kreiran");
        }
    }
}