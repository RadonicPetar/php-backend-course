<?php

namespace App\Services;

use App\Models\Category;

class CategoryService{
    public function getAll(): array{
        return [
            new Category(1,'Elektronika',7),
            new Category(2,'Knjige',5),
            new Category(3,'Vrt',5),
        ];
    }
}