<?php

namespace Iterators\Interfaces;

class SampleList{
    private array $items = [];

    private int $position = 0;

    public function __construct(array $items){
        $this->items = $items;
    }

    //trenutni element
    public function current(){
        return $this->items[$this->position];
    }

    //sljedeći element
    public function next(): void{
        $this->position++;
    }

    //provjera postojanja elementa
    public function valid(): bool{
        return isset($this->items[$this->position]);
    }

    //reset iteratora
    public function reset(): void{
        $this->position = 0;
    }

    public function sortDesc(): void{
        rsort($this->items);
        $this->reset();
    }

    public function sortAsc(): void{
        sort($this->items);
        $this->reset();
    }

    //dodavanje novog elementa
    public function addItem($item): void{
        $this->items[]=$item;
    }

    public function countItems(){
        return count($this->items);
    }

    public function firstItem(){
        return $this->items[0] ?? null;
    }

    public function lastItem(){
        return $this->items[$this->countItems()-1] ?? null;
    }

    public function existingItem($value): bool{
        return in_array($value,$this->items);
    }

    public function printAll(){
        $this->reset();

        while($this->valid()){
            echo $this->current()."<br>";
            $this->next();
        }
    }
}