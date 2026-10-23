<?php

namespace Iterators;

use Iterator;

class JsonTableIterator implements Iterator{

    private array $items = [];
    private int $position = 0;

    public function __construct(array $items){
        $this->items=$items;
    }

    public function current(): mixed{
        return $this->items[$this->position];
    }

    public function key(): mixed{
        return $this->position+1;
    }

    public function next(): void{
        $this->position++;
    }

    public function rewind(): void{
        $this->position=0;
    }

    public function valid(): bool{
        return isset($this->items[$this->position]);
    }
}