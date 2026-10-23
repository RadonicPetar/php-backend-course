<?php

namespace TDDProjekt;

use InvalidArgumentException;

class Calculator{
    public function add(int $a,int $b): int{
        
        //GREEEN FAZA
        //return 5;

        //REFACTOR FAZA
        return $a+$b;
    }

    public function substract(int $a, int $b): int{
        return $a-$b;
    }

    public function mulitply(int $a, int $b): int{
        return $a*$b;
    }
    
    public function divide(int $a, int $b): float{
        
        if($b===0){
            throw new InvalidArgumentException("Dijeljenje s nulom nije dozvoljeno.");
        }
        return $a/$b;
    }
    
    public function modulo(int $a, int $b): int{
        
        if($b===0){
            throw new InvalidArgumentException("Modulo s nulom nije dozvoljeno.");
        }
        return $a%$b;
    } 
    
    public function korijen(int $broj): float{
        return sqrt($broj);
    }
}