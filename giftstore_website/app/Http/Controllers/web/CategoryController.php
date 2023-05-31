<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\CategoryController as ServicesCategoryController;

class CategoryController extends Controller
{
    public function categoryManagement(){
        $categoryController = new ServicesCategoryController();
        $data_category = $categoryController->getAllCategory();
        $categories = [];
        if($data_category['data']!=null)
            $categories = $data_category['data']->collection;
        return view('admin/category_management/category_management', ['categories' => $categories]);
    }
}
