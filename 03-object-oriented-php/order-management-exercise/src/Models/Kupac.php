<?php

namespace Models;

use Interfaces\JsonSerializableInteface;
use Interfaces\ObserverInterface;
use Services\MailService;
class Kupac implements JsonSerializableInteface, ObserverInterface{

    public function __construct(
        public int $id,
        public string $naziv,
        public bool $aktivan,
        public string $email
    )
    {

    }

    public function toArray(): array{
        return [
            "id"=>$this->id,
            "naziv"=>$this->naziv,
            "aktivan"=>$this->aktivan,
            "email"=>$this->email
        ];
    }

    public function update(string $message): string{
        $mailService = new MailService();

        $mailSent = $mailService->send($this->email,"Nova obavijest APP",$message);
        if($mailSent){
            return "Mail uspješno poslan kupcu: ".$this->naziv." (".$this->email."): ".$message;
        }
        
        return "Greška kos slanja maila za kupca: ".$this->naziv;
    }
}