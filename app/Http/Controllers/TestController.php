<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;

class TestController extends Controller
{
    public function welcome(){
       //return view('welcome');
    /*  $a = 5;
      $b = 10;
      $c = $a + $b;
      return "El valor de la variable es $c";*/
      //$products = Product::all();
      /*$products = Product::paginate(9);
      return view('welcome')->with(compact('products')); */
    //  $categories = Category::get();
      $categories = Category::has('products')->get();
      return view('welcome')->with(compact('categories'));
    }
}
