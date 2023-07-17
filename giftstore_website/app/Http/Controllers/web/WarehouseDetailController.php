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

    // public function warehouseDetailManagement(Request $request, $id_warehouse){
    //     $warehouseDetailController = new ServicesWarehouseDetailController();
    //     $data_warehouseDetail = $warehouseDetailController->getAllWarehouseDetailByIdWarehouse($id_warehouse);
    
    //     $warehouseDetails = $data_warehouseDetail['data']->collection ?? collect([]);
    //     $perPage = 1; 
    //     $currentPage = max(1, $request->input('page', 1));
    //     $offset = ($currentPage - 1) * $perPage;
    
    //     $paginatedWarehouseDetails = $warehouseDetails->slice($offset, $perPage);
    //     $lastPage = ceil($warehouseDetails->count() / $perPage);
    //     $startPage = max(1, $currentPage - 2);
    //     $endPage = min($lastPage, $currentPage + 2);
    
    //     if ($startPage === 1 && $currentPage === 1) {
    //         $endPage = min($lastPage, 3);
    //     }
    //     $endPage = min($lastPage, $startPage + 4);
    
    //     return view('admin/warehouse_management/warehouse_detail', [
    //         'warehouseDetails' => $paginatedWarehouseDetails,
    //         'pagination' => [
    //             'perPage' => $perPage,
    //             'currentPage' => $currentPage,
    //             'lastPage' => $lastPage,
    //             'startPage' => $startPage,
    //             'endPage' => $endPage,
    //         ],
    //     ]);
    // }
    
    

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
