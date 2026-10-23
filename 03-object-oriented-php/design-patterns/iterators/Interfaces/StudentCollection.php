<?php

namespace Iterators\Interfaces;
use Iterators\Models\Student;
use Iterator;
class StudentCollection implements Iterator{
    private array $students = [];
    private int $position = 0;

    public function current(): mixed{
        return $this->students[$this->position] ?? null;
    }

    public function key(): mixed{
        return $this->position;
    }

    public function next(): void{
        $this->position++;
    }

    public function rewind(): void{
        $this->position=0;
    }

    public function valid(): bool{
        return isset($this->students[$this->position]);
    }

    public function add(Student $student): void{
        $this->students[]=$student;
    }

    public function countStudents(): int{
        return count($this->students);
    }

    public function printAll(): void{
        foreach($this->students as $student){
            echo "<br>Info: ".$student->getFullData();
        }
    }

    public function printAllCustom(): void{
        $this->rewind();
        while($this->valid()){
            $student = $this->current();
            echo $student->getFullData()."<br>";
            $this->next();
        }
    }

    public function studentExists(string $search): void{
        $counter=false;
        foreach($this->students as $student){
            if($student->ime == $search){
                echo "<br>Student postoji: ".$student->ime;
                $counter = true;
                break;
            }
        }
        if(!$counter){
            echo "<br>Student ne postoji";
        }
    }
}