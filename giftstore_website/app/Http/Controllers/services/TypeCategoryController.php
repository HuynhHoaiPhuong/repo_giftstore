<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeCategory;
use App\Http\Resources\TypeCategoryResource;
use App\Http\Payload;
use Carbon\Carbon;

class TypeCategoryController extends Controller
{
    public function getAllTypeCategoryByStatus($status){
        $typeCategories = TypeCategory::where('status', $status)->get();

        if($typeCategories->isEmpty())
            return Payload::toJson(null, "Data Not Found", 404);   

        return Payload::toJson(TypeCategoryResource::collection($typeCategories), "Request Successfully", 200);
    }

    public function saveTypeCategory(Request $request){
        $typeCategories = new TypeCategory();
        $typeCategories->fill([
            'id_type_category' => "TYPECAT".Carbon::now()->format('ymdhis').rand(1, 1000), 
            'numerical_order' => $request->numerical_order,
            'name' => $request->name, 
            'slug' => $request->slug, 
        ]);
        if($typeCategories->save() == 1){
            $typeCategories = TypeCategory::where('id_type_category',$typeCategories->id_type_category)->first();
            return Payload::toJson(new TypeCategoryResource($typeCategories),'Completed',201);
        }
        return Payload::toJson(null,'Uncompleted',500);
    }

    public function updateTypeCategory(Request $request){
        $result = TypeCategory::where('id_type_category', $request->id_type_category)
        ->update([
            'numerical_order' => $request->numerical_order,
            'name' => $request->name, 
            'slug' => $request->slug
        ]);  

        if($result == 1){
            $typeCategories = TypeCategory::where('id_type_category', $request->id_type_category)->first();
            return Payload::toJson(new TypeCategoryResource($typeCategories), "Update Successfully", 202);
        }
        return Payload::toJson(null, "Cannot Update", 500);
    }

    public function removeTypeCategory(Request $request){
        $result = TypeCategory::where('id_type_category', $request->id_type_category)
        ->update(['status' => $request->status]);

        if($result == 1){
            $typeCategories = TypeCategory::where('id_type_category', $request->id_type_category)->first();
            return Payload::toJson(new TypeCategoryResource($typeCategories), "Remove Successfully", 202);
        }
        return Payload::toJson(null, "Cannot Update", 500);
    }
}
