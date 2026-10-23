<?php

namespace Services;

class MailService{

    public function send(string $to, string $subject, string $message): bool{
        $headers = "From: test@gmail.com";

        return mail($to,$subject,$message,$headers);
    }
}