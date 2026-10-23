<?php

return [

    'required'=>'Polje :attribute je obavezno',
    'min'=>[
        'string'=>'Polje :attribute mora imati najmanje :min znakova',
        'numeric'=>'Polje :attribute mora biti najmanje :min',
    ],
    'max'=>[
        'string'=>'Polje :attribute ne smije biti veće od :max znakova',
        'numeric'=>'Polje :attribute ne smije biti veće od :max',
    ],
    'numeric'=>'Polje :attribute mora biti broj',
    'integer'=>'Polje :attribute mora biti cijeli broj',
    'gt'=>[
        'numeric'=>'Polje :attribute mora biti veće od :value'
    ],

    'custom'=>[
        'naziv'=>[
            'regex'=>'Naziv knjige mora početi velikim slovom',
        ],
        'autor'=>[
            'regex'=>'Ime i prezime autora mora početi velikim slovom',
        ],
        'godina'=>[
            'min'=>'Godina ne smije biti manja od 1800',
            'max'=>'Godina ne smije biti veća od trenutne godine'
        ],
        'cijena'=>[
            'gt'=>'Cijena mora biti veća od 0.',
            'lte'=>'Cijena mora biti manja ili jednaka 500'
        ]
    ],

    'attributes'=>[
        'naziv'=>'naziv',
        'autor'=>'autor',
        'godina'=>'godina',
        'cijena'=>'cijena',
    ]
];