<?php

namespace Singleton\Core;

class Counter{
    private static ?Counter $instance = null;

    private int $count = 0;

    private function __construct(){}

    public static  function getInstance() : Counter {
        if(self::$instance===null){
            self::$instance=new Counter();
        }

        return self::$instance;
    }

    public function increment(): void{
        $this->count++;
    }

    public function getCount(): int{
        return $this->count;
    }
}