<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\ProductController as ServicesProductController;

class ProductController extends Controller
{
    public function productManagement(){
        $productController = new ServicesProductController();
        $data_product = $productController->getAllProduct();
        $products = [];
        if($data_product['data']!=null)
            $products = $data_product['data']->collection;
        return view('admin/product_management/product_management', ['products' => $products]);
    }
    public function addProduct(){
        return view('admin/product_management/add_product');
    }
}
