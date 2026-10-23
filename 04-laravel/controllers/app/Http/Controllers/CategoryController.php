<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index(){

        $categories = CategoryService::getAll();

        foreach($categories as $cat){
            if($cat->popularity>5){
                $cat->popularity*=2;
            }
            $categories[]=new Category(4,"Nova",$cat->popularity);
        }
        return view('categories',[
            'categories'=>$categories,
        ]);
    }

    public function json(){
        $categories = CategoryService::getAll();
        return response()->json($categories);
    }
}
