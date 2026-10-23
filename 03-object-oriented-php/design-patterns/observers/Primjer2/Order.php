<?php

namespace Observers\Primjer2;

use DateTime;
use Observers\Contracts\SubjectInterface;
use Observers\Contracts\ObserverInterface;

class Order implements SubjectInterface{
    private array $observers = [];

    public function attach(ObserverInterface $observer): void{
        $this->observers[]=$observer;
    }

    public function detach(ObserverInterface $observer): void{
        foreach($this->observers as $key=>$obs){
            if($obs==$observer){
                unset($this->observers[$key]);
            }
        }
    }

    public function notify(): void{
        $date = new DateTime();
        $vrijeme = $date->format("d.m.Y H:i:s.u");
        $poruka = "Narudžba kreirana u ".$vrijeme;
        foreach($this->observers as $observer){
            $observer->update($poruka);
        }
    }
}