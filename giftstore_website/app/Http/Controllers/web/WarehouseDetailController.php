<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WarehouseDetailController extends Controller
{
    public function warehouseDetailManagement($id_warehouse){
        return view('admin/warehouse_management/warehouse_detail');
    }
}
