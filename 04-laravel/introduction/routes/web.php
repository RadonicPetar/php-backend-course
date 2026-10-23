<?php

use Illuminate\Support\Facades\Route;
use App\Services\MathService;
use App\Models\Category;
use Carbon\Carbon;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
});

//prva ruta
Route::get('/prva',function (){
    return 'Prva ruta';
});

Route::get('/druga',function (){
    return 'Rezultat: '.(3+2);
});

Route::get('/korisnik/edit',function(){
    return 'Editiranje korisnika';
});

Route::get('/proizvod/{id}',function($id){
    return "Proizvod ID: {$id}";
})->whereNumber('id');

Route::get('/knjige/{id?}',function($id=null){
    $knjige = [
        1=>"Knjiga 1",
        2=>"Knjiga 2",
        3=>"Knjiga 3",
        4=>"Knjiga 4",
        5=>"Knjiga 5"
    ];

    if($id===null){
        foreach($knjige as $knjigaid=>$naziv){
            echo "<br>Knjiga ID: ".$knjigaid;
            echo "<br>Knjiga naziv: ".$naziv;
        }
    }
    else
        {
            return "Knjiga ID: {$knjige[$id]}";
        }
})->whereNumber('id');

Route::get('/html',function(){
    return '<h1>Pozdrav</h1><p>Ovo je prvi ispis html</p>';
});

Route::get('/json',function(){
    return [
        'status'=>'success',
        'message'=>'Hello JSON',
        'year'=>date("Y")
    ];
});

Route::get('/json-explicit',function(){
    return response()->json([
        'user'=>'Ivan',
        'role'=>'Admin'
    ]);
});

Route::get('/created',function(){
    return response('Created',201);
});

Route::get('/ok',function(){
    return response('OK',200);
})->name('ok');

Route::get('/demo',function (){
    return redirect()->route('ok');
});

Route::get('/bad',function (){
    return response('Bad request',400);
});

Route::get('/notfound',function (){
    abort(404);
});

//STATUSI
// 200 = uspješan zahtjev
// 201 = uspješno kreiran zapis
// 400 = loš zahtjev
// 401 = nije prijavljen
// 403 = zabranjeno
// 404 = nije pronađeno
// 500 = greška servera

Route::get('/download',function(){
    return response()->download(storage_path('app/test.txt'));
});

// Route::get('/admin/users',function(){
//     return 'Admin users';
// });

// Route::get('/admin/settings',function(){
//     return 'Admin settings';
// });

// Route::get('/admin/prava',function(){
//     return response()->json([
//         ['pravoid'=>1,'naziv'=>'Pregled'],
//         ['pravoid'=>2,'naziv'=>'Brisanje']
//     ]);
// });

Route::prefix('admin')->group(function (){
    Route::get('/users',function(){
        return 'Admin users';
    });
    Route::get('/settings',function(){
        return 'Admin settings';
    });
    Route::get('/prava',function(){
        return response()->json([
            ['pravoid'=>1,'naziv'=>'Pregled'],
            ['pravoid'=>2,'naziv'=>'Brisanje']
        ]);
    });
    Route::get('/student/{id}/predmet/{predmet}',function(int $id,string $predmet){
        return "Student: {$id}, predmet: {$predmet}";
    });
});

// Route::get('calc/zbroj/{a}/{b}',function (int $a, int $b, MathService $math){
//     return (string) $math->zbroj($a,$b);
// });

// Route::get('calc/razlika/{a}/{b}',function (int $a, int $b, MathService $math){
//     return (string) $math->razlika($a,$b);
// });

Route::prefix('calc')->group(function() {
    Route::get('zbroj/{a}/{b}',function (int $a, int $b, MathService $math){
        return (string) $math->zbroj($a,$b);
    });
    Route::get('razlika/{a}/{b}',function (int $a, int $b, MathService $math){
        return (string) $math->razlika($a,$b);
    });
    Route::get('produkt/{a}/{b}',function (int $a, int $b, MathService $math){
        return (string) $math->produkt($a,$b);
    });
    Route::get('kvocijent/{a}/{b}',function (int $a, int $b, MathService $math){
        try{
            return (string) $math->kvocijent($a,$b);
        }
        catch(InvalidArgumentException $ex){
            return response()->json(['error'=>$ex->getMessage()],400);
        }
        
    });
    Route::get('ostatak/{a}/{b}',function (int $a, int $b, MathService $math){
        try{
            return (string) $math->ostatak($a,$b);
        }
        catch(InvalidArgumentException $ex){
            return response()->json(['error'=>$ex->getMessage()],400);
        }
        
    });
});

Route::match(['get','post'],'/kontakt',function(){
    return 'Kontakt: '.request()->method();
});

Route::get('/request',function (){
    return response()->json([
        'url'=>request()->url(),
        'method'=>request()->method(),
        'ip'=>request()->ip(),
        'route'=>request()->path(),
        'user-agent'=>request()->userAgent()
    ]);
});

Route::get('/test/{name}',function($name){
    return view('popis',[
        'name'=>$name
    ]);
});

Route::get('/popis',function(){
    $popis=[
        "1"=>"Vrtić",
        "2"=>"Trgovina",
        "3"=>"Posao"
    ];
    return view('popis',[
        'popis'=>$popis
    ]);
});

Route::get('/categories-json',function(){
    $categories = [
        new Category(1,'Hrana'),
        new Category(2,'Vrt'),
        new Category(3,'Knjige')
    ];
    return response()->json($categories);
});

Route::get('/categories-view',function(){
    $categories = [
        new Category(1,'Hrana'),
        new Category(2,'Vrt'),
        new Category(3,'Knjige')
    ];
    return view('popis',[
        'categories'=>$categories,
        'datum'=>Carbon::now()->format('d.m.Y')
    ]);
});