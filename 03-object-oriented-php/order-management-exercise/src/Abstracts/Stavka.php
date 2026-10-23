<?php

namespace Abstracts;

abstract class Stavka{
    public function __construct(
        public int $id,
        public string $naziv,
        public int $kolicina,
        public float $cijena
    )
    {}

    public function ukupnaVrijednost(): float{
        return $this->kolicina*$this->cijena;
    }

    abstract public function toArray(): array;
}