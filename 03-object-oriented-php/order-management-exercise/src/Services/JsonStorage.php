<?php

namespace Services;

class JsonStorage{

    private static ?JsonStorage $instance = null;

    private function __construct(){}

    public static function getInstance(): JsonStorage{
        if(self::$instance == null){
            self::$instance = new JsonStorage();
        }
        return self::$instance;
    }

    //spremanje
    public function save(string $file, array $data): void{
        if(!is_dir("storage")){
            mkdir("storage");
        }
        file_put_contents("storage/".$file,json_encode($data,JSON_PRETTY_PRINT));
    }

    public function read(string $file): array{
        $path = "storage/".$file;
        if(!file_exists($path)){
            return [];
        }

        $json = file_get_contents($path);

        return json_decode($json,true) ?? [];
    }

}