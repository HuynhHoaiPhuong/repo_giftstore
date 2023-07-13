<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\WarehouseDetailController as ServicesWarehouseDetailController;

class WarehouseDetailController extends Controller
{
    public function warehouseDetailManagement($id_warehouse){
        $warehouseDetailController = new ServicesWarehouseDetailController();
        $data_warehouseDetail = $warehouseDetailController->getAllWarehouseDetailByIdWarehouse($id_warehouse);
        $warehouseDetails = [];
        if($data_warehouseDetail['data']!=null)
        $warehouseDetails = $data_warehouseDetail['data']->collection;
        return view('admin/warehouse_management/warehouse_detail',['warehouseDetails'=>$warehouseDetails]);
    }

    public function updateWarehouseDetail(Request $req){
        if(!$req->id_warehouse_detail){
            return back()->with('error','Chỉnh sửa thất bại');
        }
        if($req->price_pay < ((int)$req->price_old - (int)($req->price_old*0.2))){
            return back()->with('error','Giá bán mới không được thấp hơn giá nhập về');
        }
        $warehouseDetailController = new ServicesWarehouseDetailController();


        $reqNew = new Request([
            'id_warehouse_detail'=>$req->id_warehouse_detail,
            'price_pay'=>$req->price_pay,
            'total_price'=> (int)($req->price_pay*$req->quantity),
        ]);

        $result = $warehouseDetailController->updateWarehouseDetail($reqNew);

        if($result['data']==null){
            return back()->with('error','Chỉnh sửa thất bại');
        }
        return redirect(route('warehouse-detail-management', ['id_warehouse' => $req->id_warehouse]));
    }
}
