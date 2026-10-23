<?php

namespace App\Models;

class Book{
    public function __construct(
        public int $id,
        public string $naziv,
        public string $autor,
        public int $godina,
        public float $cijena
    )
    {

    }

    public static function getAll(): array
    {
        $putanja = storage_path('app/knjige.json');
        if(!file_exists($putanja)){
            return [];
        }

        $json = file_get_contents($putanja);

        return json_decode($json,true) ?? [];
    }

    public static function getNextId(): int
    {
        $knjige = self::getAll();
        if(count($knjige)===0){
            return 1;
        }

        $maxId = 0;
        foreach($knjige as $knjiga){
            if($knjiga['id']>$maxId){
                $maxId=$knjiga['id'];
            }
        }
        return $maxId+1;
    }

    public static function save(array $knjiga): void
    {
        $knjige =self::getAll();
        $knjige[]=$knjiga;

        file_put_contents(storage_path('app/knjige.json'),json_encode($knjige,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}