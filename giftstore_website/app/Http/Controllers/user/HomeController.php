<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\ProductController as ServicesProductController;
use App\Http\Controllers\services\WarehouseDetailController as ServicesWarehouseDetailController;

class HomeController extends Controller
{
    public function index(){
        $warehouseDetailController = new ServicesWarehouseDetailController();
        $data_warehouseDetail = $warehouseDetailController->getAllWarehouseDetailByStatus('enabled');
        $warehouseDetails = [];
        if($data_warehouseDetail['data']!=null)
            $warehouseDetails = $data_warehouseDetail['data']->collection->take(12);

        return view('user/templates/index', [
            'warehouseDetails' => $warehouseDetails, 
        ]);
    }

    
}
