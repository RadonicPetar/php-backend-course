<?php

namespace Iterators\Interfaces;

use IteratorAggregate;
use ArrayIterator;
use Traversable;



class JsonIterator implements IteratorAggregate{
    private array $items = [];

    public function __construct(string $jsonFile){
        if(file_exists($jsonFile)){
            $json=file_get_contents($jsonFile);
            $this->items = json_decode($json,true) ?? [];
        }
    }

    public function getIterator(): Traversable{
        return new ArrayIterator($this->items);
    }

    public function getOldest(): ?array{
        if(empty($this->items)){
            return null;
        }

        $oldest = $this->items[0];

        foreach($this->items as $item){
            if($item["godine"]>$oldest["godine"]){
                $oldest=$item;
            }
        }
        return $oldest;
    }

    public function averageYears(): float{
        if(empty($this->items)){
            return 0;
        }

        $sum = 0;
        foreach($this->items as $item){
            $sum+=$item["godine"];
        }

        return $sum/count($this->items);
    }
}