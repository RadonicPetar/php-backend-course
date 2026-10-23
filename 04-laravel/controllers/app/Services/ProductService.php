<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;

class ProductService
{
    public static function getAllProducts(): array
    {
        $food = new Category(1, 'Food', 7);
        $tech = new Category(2, 'Technology', 9);
        $books = new Category(3, 'Books', 5);

        return [
            new Product(1, 'Bread', 1.20, $food),
            new Product(2, 'Book', 29.90, $books),
            new Product(3, 'Keyboard', 35.20, $tech),
            new Product(4, 'Mouse', 3.50, $tech),
        ];
    }
}