<?php

require_once "IJsonModel.php";
require_once "Kategorija.php";
require_once "AbsProvjera.php";

class Proizvod extends AbsProvjera implements IJsonModel{

    private int $id;
    private string $naziv;
    private float $cijena;
    protected static string $fileName = "proizvodinew.json";
    private Kategorija $kategorija;

    public function __construct(string $naziv, float $cijena, Kategorija $kategorija){
        $this->naziv=$naziv;
        $this->cijena=$cijena;
        $this->kategorija=$kategorija;
        $this->id = $this->getNextId();
    }

    public static function ProvjeriPostojanje(): void{
        $putanja1 = self::getPutanja();
        $putanja2 = Kategorija::getPutanja();

        if(file_exists($putanja1)){
            unlink($putanja1);
        }

        if(file_exists($putanja2)){
            unlink($putanja2);
        }
    }
    public function getNextId(): int{
        $putanja = self::getPutanja();

        if(!file_exists($putanja)){
            return 1;
        }

        $data = json_decode(file_get_contents($putanja),true);
        $ids = array_column($data,"id");

        return empty($ids) ? 1 : max($ids)+1;
    }

    public function spremi(): void{
        $putanja = self::getPutanja();
        if(file_exists($putanja)){
            $data = json_decode(file_get_contents($putanja),true) ?? [];
        }

        $data[]=[
            "id"=>$this->id,
            "naziv"=>$this->naziv,
            "cijena"=>$this->cijena,
            "kategorijaSifra"=>$this->kategorija->getSifra()
        ];
        
        file_put_contents($putanja,json_encode($data,JSON_PRETTY_PRINT));
    }

    public static function dohvatiSve(): array{
         $putanja = self::getPutanja();

        if(!file_exists($putanja)){
            return [];
        }

        return json_decode(file_get_contents($putanja),true) ?? [];
    }

    public static function dohvatiSaKategorijama(): array{
        $proizvodi = self::dohvatiSve();
        $kategorije = Kategorija::dohvatiSve();

        $rezultat = [];

        foreach($proizvodi as $p){
            $nazivKategorije="Nepoznato";
            foreach($kategorije as $k){
                if($k["sifra"]==$p["kategorijaSifra"]){
                    $nazivKategorije=$k["naziv"];
                    break;
                }
            }

            $rezultat[]=[
                "id"=>$p["id"],
                "naziv"=>$p["naziv"],
                "cijena"=>$p["cijena"],
                "kategorija"=>$nazivKategorije
            ];
        }
        return $rezultat;
    }

    public function __destruct(){
        // self::ProvjeriPostojanje();
        // echo "<br>JSON datoteke obrisane!";
    }
}