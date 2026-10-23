<?php

namespace Observers\Contracts;

interface SubjectInterface{

    public function attach(ObserverInterface $observer): void;
    public function detach(ObserverInterface $observer): void;
    public function notify(): void;
}