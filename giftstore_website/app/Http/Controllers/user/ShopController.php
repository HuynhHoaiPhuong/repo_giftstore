<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\WarehouseDetailController as ServicesWarehouseDetailController;
use App\Models\WarehouseDetail;

class ShopController extends Controller
{
    public function index(){
        $warehouseDetailController = new ServicesWarehouseDetailController();
        $data_warehouseDetail = $warehouseDetailController->getAllWarehouseDetailByStatus('enabled');

        $warehouseDetails = collect([]);
        $perPage = 12;
        $currentPage = max(1, request()->input('page', 1));
        $offset = ($currentPage - 1) * $perPage;

        if ($data_warehouseDetail['data'] != null) {
            $warehouseDetails = $data_warehouseDetail['data']->collection;
        }

        $paginatedContacts = collect($warehouseDetails)->slice($offset, $perPage);

        $lastPage = ceil($warehouseDetails->count() / $perPage);
        $startPage = max(1, $currentPage - 2);
        $endPage = min($lastPage, $currentPage + 2);

        if ($startPage === 1 && $currentPage === 1) {
            $endPage = min($lastPage, 3);
        }
        $endPage = min($lastPage, $startPage + 4);

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
            'selectedPrices' => [],
            'selectedCategories' => [],
        ]);
    }

    public function filterProducts(Request $request){
        $selectedPrices = $request->input('price_pay', []);
        $selectedCategories = $request->input('category', []);
        // $sortBy = $request->input('sort_by', 'default');
        // $sortOrder = $request->input('sort_order', 'asc');
        $warehouseDetails = WarehouseDetail::all();
        $filteredWarehouseDetails = [];

        foreach ($warehouseDetails as $warehouseDetail) {
            $price = $warehouseDetail->price_pay;
            $id_category = $warehouseDetail->product->id_category;

            if(in_array('price-0', $selectedPrices) ||
                (in_array('price-1', $selectedPrices) && $price < 100000) ||
                (in_array('price-2', $selectedPrices) && $price >= 100000 && $price < 500000) ||
                (in_array('price-3', $selectedPrices) && $price >= 500000 && $price < 1000000) ||
                (in_array('price-4', $selectedPrices) && $price >= 1000000 && $price < 3000000) ||
                (in_array('price-5', $selectedPrices) && $price >= 3000000 && $price <= 5000000) ||
                (in_array('price-6', $selectedPrices) && $price > 5000000)
            ){
                if (in_array('category-' . $id_category, $selectedCategories)) {
                    $filteredWarehouseDetails[] = $warehouseDetail;
                }
                else {
                    $filteredWarehouseDetails[] = $warehouseDetail;
                }
            } 
            else if (!$selectedPrices && in_array('category-' . $id_category, $selectedCategories)){
                $filteredWarehouseDetails[] = $warehouseDetail;
            }
        }

        $warehouseDetails = collect($filteredWarehouseDetails);

        // if ($sortBy === 'default') {
        //     $warehouseDetails = $warehouseDetails->sortBy('id_warehouse_detail', SORT_REGULAR, $sortOrder === 'desc');
        // } elseif ($sortBy === 'price') {
        //     $warehouseDetails = $warehouseDetails->sortBy('price_pay', SORT_NUMERIC, $sortOrder === 'desc');
        // }

        $perPage = 12;
        $currentPage = max(1, request()->input('page', 1));
        $offset = ($currentPage - 1) * $perPage;
        $paginatedContacts = collect($warehouseDetails)->slice($offset, $perPage);
        $lastPage = ceil($warehouseDetails->count() / $perPage);
        $startPage = max(1, $currentPage - 2);
        $endPage = min($lastPage, $currentPage + 2);
        if ($startPage === 1 && $currentPage === 1) {
            $endPage = min($lastPage, 3);
        }
        $endPage = min($lastPage, $startPage + 4);

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
            'selectedPrices' => $selectedPrices,
            'selectedCategories' => $selectedCategories,
            // 'sortBy' => $sortBy,
            // 'sortOrder' => $sortOrder,
        ]);
    }
  
}