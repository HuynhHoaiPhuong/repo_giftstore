<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\services\ProductController as ServicesProductController;
use App\Http\Controllers\services\CategoryController as ServicesCategoryController;
use App\Http\Controllers\services\ProviderController as ServicesProviderController;

class ProductController extends Controller
{
    public function productManagement(){
        $productController = new ServicesProductController();
        $categoryController = new ServicesCategoryController();
        $providerController = new ServicesProviderController();

        $data_category = $categoryController->getAllCategoryByStatus('enabled');
        $data_provider = $providerController->getAllProviderByStatus('enabled');
        $data_product = $productController->getAllProductByStatus('enabled');

        $categories = [];
        if($data_category['data']!=null)
            $categories = $data_category['data']->collection;

        $providers = [];
        if($data_provider['data']!=null)
            $providers = $data_provider['data']->collection;
        
        $products = [];
        if($data_product['data']!=null)
            $products = $data_product['data']->collection;
        return view(
            'admin/product_management/product_management',
            [
                'products' => $products,
                'categories' => $categories,
                'providers' => $providers
            ]
        );
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
            return back()->with('error','Tạo thất bại');
        }
        $newName = 'noimage.png';
        if($req->hasFile('photo')){
            $photo = $req->file('photo');
            $name = $photo->getClientOriginalName();
            $originalName = current(explode('.',$name));
            $newName = $originalName . rand(0,99) . '.' . $photo->getClientOriginalExtension(); 
            $photo->move('upload/product', $newName);
        }
        $req->photo = $newName;
        $result = $productController->saveProduct($req);
        if($result['data']==null){
            return back()->with('error','Tạo thất bại');
        }
        return redirect(route('product-management'));
    }

    public function updateProduct(Request $req){
        $productController = new ServicesProductController();
        $newName = $req->photoCurrent;
        // var_dump((file_exists('upload/product/'.$req->photoCurrent)) ? 'true' : 'false');die('XXX');
        if($req->hasFile('photo')){
            if($req->photoCurrent != 'noimage.png'){
                if(file_exists('upload/product/'.$req->photoCurrent)){
                    unlink('upload/product/'.$req->photoCurrent);
                }else{
                    // dd('File does not exists.');
                    return back()->with('error','Xóa ảnh thất bại');
                }
            }
            $photo = $req->file('photo');
            $name = $photo->getClientOriginalName();
            $originalName = current(explode('.',$name));
            $newName = $originalName . rand(0,99) . '.' . $photo->getClientOriginalExtension(); 
            $photo->move('upload/product', $newName);
        }
        $req->photo = $newName;

        $result = $productController->updateProduct($req);

        if($result['data']==null){
            return back()->with('error','Chỉnh sửa thất bại');
        }
        return redirect(route('product-management'));
    }

    public function recycleProduct(){
        $productController = new ServicesProductController();
        $data_product = $productController->getAllProductByStatus('disabled');
        $products = [];
        if($data_product['data']!=null)
        $products = $data_product['data']->collection;
        return view('admin/product_management/recycle_product',['products'=>$products]);
    }
}
