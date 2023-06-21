<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\CategoryController as ServicesCategoryController;
use App\Http\Controllers\services\TypeCategoryController as ServicesTypeCategoryController;

class CategoryController extends Controller
{
    public function categoryManagement(){
        $categoryController = new ServicesCategoryController();
        $typeCategoryController = new ServicesTypeCategoryController();

        $data_category = $categoryController->getAllCategory();
        $data_type_cat = $typeCategoryController->getAllTypeCategory();
        
        $categories = [];
        if($data_category['data']!=null)
            $categories = $data_category['data']->collection;

        $typeCategories = [];
        if($data_type_cat['data']!=null)
            $typeCategories = $data_type_cat['data']->collection;
        return view('admin/category_management/category_management', ['categories' => $categories,'typeCategories' => $typeCategories]);
    }

    public function addCategory(Request $req){
        $categoryController = new ServicesCategoryController();
        if($req->name==null || $req->id_type_category == null){
            return back()->withErrors('error','Tạo thất bại');
        }
        $newName = 'noimage.png';
        // var_dump($req->file('photo'));die('XXX');
        if($req->hasFile('photo')){
            $photo = $req->file('photo');
            $name = $photo->getClientOriginalName();
            $originalName = current(explode('.',$name));
            $newName = $originalName . rand(0,99) . '.' . $photo->getClientOriginalExtension(); 
            $photo->move('admin/images/category', $newName);
        }
        $req->photo = $newName;
        $result = $categoryController->saveCategory($req);
        if($result==null){
            return back()->withErrors('error','Tạo thất bại');
        }
        return redirect(route('category-management'));
    }
}
