<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeCategoryController extends Controller
{
    public function typeCategoryManagement(){
        return view('admin/category_management/type_category_management');
    }
}
