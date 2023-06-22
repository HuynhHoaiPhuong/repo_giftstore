<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // public function product(){
    //     return view('user/templates/product');
    // }

    public function productDetail(){
        return view('user/templates/product');
    }
}
