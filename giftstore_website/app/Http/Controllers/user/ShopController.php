<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\ProductController as ServicesProductController;

class ShopController extends Controller
{
    public function index(){
        $productController = new ServicesProductController();
        $data_product = $productController->getAllProductByStatus('enabled');

       

        $products = collect([]);
        $perPage = 12;
        $currentPage = max(1, request()->input('page', 1));

        $offset = ($currentPage - 1) * $perPage;

        if($data_product['data'] != null)
        $products = $data_product['data']->collection;
        $paginatedContacts = collect($products)->slice($offset, $perPage);

        $lastPage = ceil($products->count() / $perPage);
        $startPage = max(1, $currentPage - 2);
        $endPage = min($lastPage, $currentPage + 2);
    
        if ($startPage === 1 && $currentPage === 1)
            $endPage = min($lastPage, 3);
        
        $endPage = min($lastPage, $startPage + 4);
    
        $products = $products->forPage($currentPage, $perPage);

        return view('user/templates/shop', [
            'products' => $products,
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
