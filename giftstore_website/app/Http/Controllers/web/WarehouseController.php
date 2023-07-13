<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\WarehouseController as ServicesWarehouseController;

class WarehouseController extends Controller
{
    public function warehouseManagement(){
        $warehouseController = new ServicesWarehouseController();
        $data_warehouse = $warehouseController->getAllWarehouse();
        $warehouses = [];
        if($data_warehouse['data']!=null)
        $warehouses = $data_warehouse['data']->collection;
        return view('admin/warehouse_management/warehouse',['warehouses'=>$warehouses]);
    }

    public function updateWarehouse(Request $req){
        if(!$req->id_warehouse){
            return back()->withErrors('error','Chỉnh sửa thất bại');
        }
        $warehouseController = new ServicesWarehouseController();

        $result = $warehouseController->updateWarehouse($req);

        if($result['data']==null){
            return back()->withErrors('error','Chỉnh sửa thất bại');
        }
        return redirect(route('warehouse-management'));
    }
}
