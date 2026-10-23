<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
class ProductController extends Controller
{
    public function index(){
        $products = ProductService::getAllProducts();
        return view('products',[
            'products'=>$products
        ]);
    }
}
