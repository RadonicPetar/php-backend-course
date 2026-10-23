<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Product;
use App\Services\CategoryService;
use App\Services\ProductService;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/simple',function(){
    return '<h1>Ruta je izvršena</h1>';
})->middleware('simple');

// Route::get('/admin',function (){
//     return 'Dobrodošli u Admin panel';
// })->middleware('admin');

Route::get('/club',function(){
    return 'Dobro došli u klub';
})->middleware('age');

Route::get('/alkohol',function(){
    return 'Možete kupiti alkohol';
})->middleware('min.age:18');

Route::get('/casino',function(){
    return 'Možete se kockati';
})->middleware('min.age:21');

Route::get('/welcome-middleware',function(){
    return request('welcome_message');
})->middleware('welcome');

Route::get('/header-test',function(){
    return 'Ovo je response s dodatnim headerom';
})->middleware('course.header');

Route::prefix('admin-panel')
    ->middleware(['admin','course.header'])
    ->group(function(){
        
        Route::get('/dashboard',function(){
            return 'Admin dashboard';
        });
        Route::get('/users',function(){
            return 'Admin users';
        });
        Route::get('/settings',function(){
            return 'Admin settings';
        });
    });

Route::get('/terminate-test', function(){
    return 'Terminate test middlware-a';
})->middleware('log.after');

Route::get('/secure-products-json',function(){
    $food = new Category(1,'Food',7);
    $tech = new Category(2,'Technology',9);
    $books = new Category(3,'Books',5);

    $products = [
        new Product(1,'Bread',1.20,$food),
        new Product(2,'Milk',1.10,$food),
        new Product(3,'Keyboard',35.20,$tech),
        new Product(4,'Mouse',18.50,$tech),
        new Product(5,'Clean Code',29.90,$books),
    ];

    return response()->json($products);
})->middleware('api.key');

Route::get('/show-categories',function (){
    $service = new CategoryService();
    $categories = $service->getAll();

    $output = "<h3>Kategorije</h3>";
    $output.="<ul>";
    foreach($categories as $category){
        $output.="<li>{$category->name}, popularnost: {$category->popularity}</li>";
    }
    $output.="</ul>";

    return $output;
})->middleware('check.categories');

Route::get('/show-categories-log',function (){
    $service = new CategoryService();
    $categories = $service->getAll();

    $output = "<h3>Kategorije za log</h3>";
    $output.="<ul>";
    foreach($categories as $category){
        $output.="<li>{$category->name}, popularnost: {$category->popularity}</li>";
    }
    $output.="</ul>";

    return $output;
})->name('show.categories.log')->middleware('check.categories.log');

Route::get('/show-products', function () {

    $service = new ProductService();

    $products = $service->getAllProducts();

    $output = '<h3>Proizvodi</h3><ul>';

    foreach ($products as $product) {
        $output .= "<li>
            {$product->name}
            |
            {$product->category->name}
            |
            {$product->price} EUR
        </li>";
    }

    $output .= '</ul>';

    return $output;

})->middleware('check.products');