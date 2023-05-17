<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\CategoryResource;
use App\Http\Payload;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function getAllCategoryByStatus($status)
    {
        $categories = Category::where('status', $status)->get();
        if($categories->isEmpty())
            return Payload::toJson(null, "Data Not Found", 404);   
        return Payload::toJson(CategoryResource::collection($categories), "Request Successfully", 200);
    }

    public function saveCategory(Request $request)
    {
        $category = new Category();
        $category->fill([
            'id_category' => "CAT".Carbon::now()->format('ymdhis').rand(1, 1000), 
            'id_type_category' => $request->id_type_category, 
            'numerical_order' => $request->numerical_order,
            'name' => $request->name, 
            'photo' => $request->photo, 
            'slug' => $request->slug, 
        ]);
        if($category->save() == 1){
            $category = Category::where('id_category', $category->id_category)->first();
            return Payload::toJson(new CategoryResource($category), "Create Successfully", 201);
        }
        return Payload::toJson(null,'Uncompleted',500);
    }

    public function updateCategory(Request $request){
        $result = Category::where('id_category', $request->id_category)->update([
            'id_type_category' => $request->id_type_category, 
            'numerical_order' => $request->numerical_order,
            'name' => $request->name, 
            'photo' => $request->photo, 
            'slug' => $request->slug, 
        ]);  
        if($result == 1){
            $category = Category::where('id_category', $request->id_category)->first();
            return Payload::toJson(new CategoryResource($category), "Update Successfully", 202);
        }
        return Payload::toJson(null, "Cannot Update", 500);
    }

    public function removeCategory(Request $request){
        $result = Category::where('id_category', $request->id_category)
        ->update(['status' => $request->status]);

        if($result == 1){
            $category = Category::where('id_category', $request->id_category)->first();
            return Payload::toJson(new CategoryResource($category), "Remove Successfully", 202);
        }
        return Payload::toJson(null, "Cannot Update", 500);
    }
}
