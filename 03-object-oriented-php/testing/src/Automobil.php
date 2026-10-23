<?php

namespace TDDProjekt;

class Automobil{

    private static int $brojAutomobila = 0;
    private array $oprema = [];
    public function __construct(
        private readonly string $vin,
        private string $marka,
        private string $model,
        private int $godina,
        private int $kilometri,
        private Gorivo $gorivo,
        private ?string $registracija = null
    )
    {
        if($godina < 1886){
            throw new \InvalidArgumentException("Godina automobila nije ispravna");
        }
    }

    public function getMarka(): string{
        return $this->marka;
    }

    public function getModel(): string{
        return $this->model;
    }

    public function getGodina(): int{
        return $this->godina;
    }

    public function getGorivo(): Gorivo{
        return $this->gorivo;
    }

    public function getKilometri(): int{
        return $this->kilometri;
    }

    public function getRegistracija(): ?string{
        return $this->registracija;
    }

    public function getVin(): string{
        return $this->vin;
    }

    public function getStarost(): int{
        return date("Y")-$this->godina;
    }

    public function dodajOpremu(string $oprema): void{
        $this->oprema[]=$oprema;
    }

    public function getOprema(): array{
        return $this->oprema;
    }

    public function getBrojAutomobila(): int{
        return self::$brojAutomobila;
    }

    public function istiAutomobil(Automobil $drugi): bool{
        return $this->vin === $drugi->vin;
    }


}