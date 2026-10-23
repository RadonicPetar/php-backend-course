<?php

namespace Iterators\Interfaces;

use IteratorAggregate;
use ArrayIterator;
use Traversable;

use Iterators\Models\Product;

class ProductCollection implements IteratorAggregate{

    private array $products = [];

    public function add(Product $product): void{
        $this->products[]=$product;
    }

    public function getIterator(): Traversable{
        return new ArrayIterator($this->products);
    }

    public function totalPrice(): float{
        $sum = 0;
        foreach($this->products as $product){
            $sum+=$product->cijena;
        }

        return $sum;
    }

    public function printAll(): void{
       
        $iterator = new ArrayIterator($this->products);

        $iterator->rewind();

        while($iterator->valid()){
            $product = $iterator->current();

            echo "<br>Proizvod: ".$product->naziv.", ".$product->cijena;
            $iterator->next();
        }
    }
}