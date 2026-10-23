<?php

namespace Observers\Contracts;

interface ObserverInterface{
    public function update(string $message): void;
}