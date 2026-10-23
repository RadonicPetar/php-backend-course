<?php

namespace App\Services;

use App\Models\Category;

class CategoryService{
    public static function getAll(): array
    {
        return [
            new Category(1,'Food',7),
            new Category(2,'Technology',6),
            new Category(3,'Books',8),
        ];
    }
}