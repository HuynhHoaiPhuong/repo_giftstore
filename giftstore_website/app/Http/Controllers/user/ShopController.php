<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\ProductController as ServicesProductController;
use App\Http\Controllers\services\WarehouseDetailController as ServicesWarehouseDetailController;

class ShopController extends Controller
{
    public function index(){
        $warehouseDetailController = new ServicesWarehouseDetailController();
        $data_warehouseDetail = $warehouseDetailController->getAllWarehouseDetailByStatus('enabled');

        $warehouseDetails = collect([]);
        $perPage = 12;
        $currentPage = max(1, request()->input('page', 1));
        $offset = ($currentPage - 1) * $perPage;

        if($data_warehouseDetail['data'] != null)
        $warehouseDetails = $data_warehouseDetail['data']->collection;

        $paginatedContacts = collect($warehouseDetails)->slice($offset, $perPage);

        $lastPage = ceil($warehouseDetails->count() / $perPage);
        $startPage = max(1, $currentPage - 2);
        $endPage = min($lastPage, $currentPage + 2);
    
        if ($startPage === 1 && $currentPage === 1)
            $endPage = min($lastPage, 3);
        $endPage = min($lastPage, $startPage + 4);
    
        $warehouseDetails = $warehouseDetails->forPage($currentPage, $perPage);

        return view('user/templates/shop', [
            'warehouseDetails' => $warehouseDetails,
            'paginatedContacts' => $paginatedContacts,
            'pagination' => [
                'perPage' => $perPage,
                'currentPage' => $currentPage,
                'lastPage' => $lastPage,
                'startPage' => $startPage,
                'endPage' => $endPage,
            ],
        ]);
    }
}
