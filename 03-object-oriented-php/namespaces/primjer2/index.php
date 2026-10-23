<?php

require_once __DIR__.'/App/Services/Mailer.php';
require_once __DIR__.'/App/Services/Notifier.php';
require_once __DIR__.'/App/Services/Logger.php';

use App\Services\{Mailer, Notifier, Logger};

$mailer=new Mailer();
$notifier = new Notifier();
$logger = new Logger();

$mailer->sendMail("student@fakultet.hr","Dobrodošli");
$notifier->sendNotification("Nova poruka u vašem sandučiću");
$logger->log("Uspješno poslane notifikacije korisnicima");