<?php

namespace Iterators\Interfaces;

use IteratorAggregate;
use Countable;
use ArrayIterator;
use Traversable;

class CountableStudents implements IteratorAggregate, Countable{
    private array $students = [];

    public  function count(): int{
        return count($this->students);
    }

    public function getIterator(): Traversable{
        return new ArrayIterator(
            $this->students
        );
    }

    public function add(string $name): void{
        $this->students[]=$name;
    }
}