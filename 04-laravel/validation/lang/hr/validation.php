<?php

return [

    'required'=>'Polje :attribute je obavezno',
    'min'=> [
        'string' => 'Polje :attribute mora imati najmanje :min znakova',
        'numeric' => 'Polje :attribute mora biti najmanje :min numeric vrijednost',
        'integer' => 'Polje :attribute mora biti najmanje :min integer vrijednost'
    ],
    'max'=> [
        'string' => 'Polje :attribute mora imati najviše :max znakova',
        'numeric' => 'Polje :attribute mora biti najviše :max numeric vrijednost',
        'integer' => 'Polje :attribute mora biti najviše :max integer vrijednost'
    ],    

    'attributes'=>[
        'sifra'=>'Šifra',
        'naziv'=>'Naziv',
        'kolicina'=>'Količina',
        'cijena'=>'Cijena',
    ],

];