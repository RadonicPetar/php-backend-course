<?php

namespace Abstracts;

use Interfaces\Arrayable;

abstract class BaseModel implements Arrayable{
    public function __construct(public int $id = 0){}
}