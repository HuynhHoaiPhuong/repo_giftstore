<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\ProductController as ServicesProductController;

class HomeController extends Controller
{
    public function index(){
        $productController = new ServicesProductController();
        $data_product = $productController->getAllProductByStatus('enabled');
        $products = [];
        if($data_product['data']!=null)
            $products = $data_product['data']->collection;
        return view('user/templates/index', ['products' => $products]);
    }
}
