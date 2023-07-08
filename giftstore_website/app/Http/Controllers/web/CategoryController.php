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
            return back()->with('error','Tạo thất bại');
        }
        $newName = 'noimage.png';
        // var_dump($req->file('photo'));die('XXX');
        if($req->hasFile('photo')){
            $photo = $req->file('photo');
            $name = $photo->getClientOriginalName();
            $originalName = current(explode('.',$name));
            $newName = $originalName . rand(0,99) . '.' . $photo->getClientOriginalExtension(); 
            $photo->move('upload/category', $newName);
        }
        $req->photo = $newName;
        $result = $categoryController->saveCategory($req);
        if($result==null){
            return back()->with('error','Tạo thất bại');
        }
        return redirect(route('category-management'));
    }

    public function updateCategory(Request $req){
        $categoryController = new ServicesCategoryController();
        $newName = $req->photoCurrent;
        // var_dump((file_exists('upload/product/'.$req->photoCurrent)) ? 'true' : 'false');die('XXX');
        if($req->hasFile('photo')){
            if($req->photoCurrent != 'noimage.png'){
                if(file_exists('upload/category/'.$req->photoCurrent)){
                    unlink('upload/category/'.$req->photoCurrent);
                }else{
                    // dd('File does not exists.');
                    return back()->with('error','Xóa ảnh thất bại');
                }
            }
            $photo = $req->file('photo');
            $name = $photo->getClientOriginalName();
            $originalName = current(explode('.',$name));
            $newName = $originalName . rand(0,99) . '.' . $photo->getClientOriginalExtension(); 
            $photo->move('upload/category', $newName);
        }
        $req->photo = $newName;

        $result = $categoryController->updateCategory($req);

        if($result==null){
            return back()->with('error','Chỉnh sửa thất bại');
        }
        return redirect(route('category-management'));
    }
}
