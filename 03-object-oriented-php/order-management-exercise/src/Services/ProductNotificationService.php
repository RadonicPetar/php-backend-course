<?php

namespace Services;

use Interfaces\ObserverInterface;

class ProductNotificationService{
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

    public function notify(string $message): array{
        $notifications=[];
        foreach($this->observers as $observer){
            $notifications[]=$observer->update($message);
        }

        return $notifications;
    }
}