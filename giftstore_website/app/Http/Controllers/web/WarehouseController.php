<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function warehouseManagement(){
        return view('admin/warehouse_management/warehouse');
    }
}
