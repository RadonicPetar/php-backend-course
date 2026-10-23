<?php

namespace Interfaces;

interface ObserverInterface{
    public function update(string $message): string;
}