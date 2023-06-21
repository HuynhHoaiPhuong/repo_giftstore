<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\TypeCategoryController as ServicesTypeCategoryController;

class TypeCategoryController extends Controller
{
    public function typeCategoryManagement(){
        $typeCategoryController = new ServicesTypeCategoryController();
        $data_type_cat = $typeCategoryController->getAllTypeCategory();
        $typeCategories = [];
        if($data_type_cat['data']!=null)
            $typeCategories = $data_type_cat['data']->collection;
        return view('admin/category_management/type_category_management', ['typeCategories' => $typeCategories]);
    }

    public function addTypeCategory(Request $req){
        $typeCategoryController = new ServicesTypeCategoryController();
        if($req->name==null){
            return back()->withErrors('error','Tạo thất bại');
        }
        $result = $typeCategoryController->saveTypeCategory($req);
        if($result==null){
            return back()->withErrors('error','Tạo thất bại');
        }
        return redirect(route('type-category-management'));
    }
}
