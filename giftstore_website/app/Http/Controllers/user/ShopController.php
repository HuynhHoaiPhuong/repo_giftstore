<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\ProductController as ServicesProductController;

class ShopController extends Controller
{
    public function index(){
            //Get Product
            $productController = new ServicesProductController();
            $data_product = $productController->getAllProductByStatus('enabled');
            $products = [];
            if($data_product['data']!=null)
                $products = $data_product['data']->collection;
        return view('user/templates/shop',[
            'products' => $products,
        ]);
    }
}
