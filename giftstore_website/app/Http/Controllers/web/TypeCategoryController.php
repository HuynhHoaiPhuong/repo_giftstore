<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\TypeCategoryController as ServicesTypeCategoryController;

class TypeCategoryController extends Controller
{
    public function typeCategoryManagement(){
        $type_catController = new ServicesTypeCategoryController();
        $data_type_cat = $type_catController->getAllTypeCategory();
        $type_cats = [];
        if($data_type_cat['data']!=null)
            $type_cats = $data_type_cat['data']->collection;
        return view('admin/category_management/type_category_management', ['type_cats' => $type_cats]);
    }
}
