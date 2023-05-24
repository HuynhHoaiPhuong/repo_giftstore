<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productManagement(){
        return view('admin/product_management/product_management');
    }
    public function addProduct(){
        return view('admin/product_management/add_product');
    }
}
