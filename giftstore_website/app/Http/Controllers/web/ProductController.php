<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\ProductController as ServicesProductController;
use App\Http\Controllers\services\CategoryController as ServicesCategoryController;
use App\Http\Controllers\services\ProviderController as ServicesProviderController;

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

    public function addproductManagement(){

        $categoryController = new ServicesCategoryController();
        $providerController = new ServicesProviderController();

        $data_category = $categoryController->getAllCategory();
        $data_provider = $providerController->getAllProvider();

        $categories = [];
        if($data_category['data']!=null)
            $categories = $data_category['data']->collection;

        $providers = [];
        if($data_provider['data']!=null)
            $providers = $data_provider['data']->collection;

        return view(
            'admin/product_management/add_product',
            [
                'categories' => $categories,
                'providers' => $providers
            ]
        );
    }

    public function addProduct(Request $req){
        $productController = new ServicesProductController();
        if($req->name==null || $req->id_provider==null || $req->id_category==null){
            return back()->withErrors('error','Tạo thất bại');
        }
        $newName = 'noimage.png';
        if($req->hasFile('photo')){
            $photo = $req->file('photo');
            $name = $photo->getClientOriginalName();
            $originalName = current(explode('.',$name));
            $newName = $originalName . rand(0,99) . '.' . $photo->getClientOriginalExtension(); 
            $photo->move('admin/images/product', $newName);
        }
        $req->photo = $newName;
        $result = $productController->saveProduct($req);
        if($result==null){
            return back()->withErrors('error','Tạo thất bại');
        }
        return redirect(route('product-management'));
    }
}
