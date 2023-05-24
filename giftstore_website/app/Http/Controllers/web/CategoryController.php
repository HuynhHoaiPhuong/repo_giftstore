<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryManagement(){
        return view('admin/category_management/category_management');
    }
}
