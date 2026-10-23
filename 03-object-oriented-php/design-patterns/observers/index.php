<?php

require_once "bootstrap.php";

use Observers\Primjer1\User;
use Observers\Primjer1\UserObserver;
use Observers\Primjer2\EmailObserver;
use Observers\Primjer2\PushObserver;
use Observers\Primjer2\SMSObserver;
use Observers\Primjer2\Order;

echo "<h2>Primjer 1</h2>";

$user = new User();
$userObserver = new UserObserver();

$user->attach($userObserver);

$user->notify();

echo "<h2>Primjer 2</h2>";

$order = new Order();

$email = new EmailObserver();
$sms = new SMSObserver();
$push = new PushObserver();

echo "<h3>Prva notifikacija</h3>";

$order->attach($email);
$order->attach($sms);
$order->attach($push);

$order->notify();

echo "<h3>Druga notifikacija</h3>";

$order->detach($sms);

$order->notify();