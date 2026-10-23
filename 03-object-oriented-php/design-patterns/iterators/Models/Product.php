<?php

namespace Iterators\Models;

class Product{
    public function __construct(public string $naziv, public float $cijena){}
}