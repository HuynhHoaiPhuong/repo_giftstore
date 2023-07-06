<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\WarehouseDetailController as ServicesWarehouseDetailController;

class ProductController extends Controller
{
    public function productDetail($id_warehouse_detail){
        $warehouseDetailController = new ServicesWarehouseDetailController();
        $data_warehouseDetail = $warehouseDetailController->getWarehouseDetailByIdWarehouseDetail($id_warehouse_detail);
        $warehouseDetail = [];
        if($data_warehouseDetail['data']!=null)
            $warehouseDetail = $data_warehouseDetail['data'];

        $relatedProducts = [];
        $allWarehouseDetail = $warehouseDetailController->getAllWarehouseDetailByStatus('enabled');
        $warehouseDetails = [];
        if($allWarehouseDetail['data']!=null)
            $warehouseDetails = $allWarehouseDetail['data']->collection;
        foreach($warehouseDetails as $k => $v){
            if($v->product->category->id_category == $warehouseDetail->product->category->id_category)
                array_push($relatedProducts, $v);
        }
        return view('user/templates/product', [
            'warehouseDetail' => $warehouseDetail, 
            'relatedProducts' => $relatedProducts,
        ]);
    }
}
