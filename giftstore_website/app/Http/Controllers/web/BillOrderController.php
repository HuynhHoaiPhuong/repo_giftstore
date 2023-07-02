<?php

namespace App\Http\Controllers\web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\services\BillOrderController as ServicesBillOrderController;
use App\Http\Controllers\services\ProductController as ServicesProductController;
use App\Http\Controllers\services\CategoryController as ServicesCategoryController;
use App\Http\Controllers\services\ProviderController as ServicesProviderController;
use App\Http\Controllers\services\WarehouseController as ServicesWarehouseController;
use App\Http\Controllers\services\PaymentController as ServicesPaymentController;
use App\Http\Controllers\services\BillOrderDetailController as ServicesBillOrderDetailController;
use App\Http\Controllers\services\WarehouseDetailController as ServicesWarehouseDetailController;

class BillOrderController extends Controller
{
    public function billOrderManagement(){
        $billOrderController = new ServicesBillOrderController();
        $data_billOrder = $billOrderController->getAllBillOrder();
        $billOrders = [];
        if($data_billOrder['data']!=null)
            $billOrders = $data_billOrder['data']->collection;
        return view('admin/bill_order_management/bill_order_management', ['billOrders' => $billOrders]);
    }

    public function addBillOrderManagement(){
        $productController = new ServicesProductController();
        $categoryController = new ServicesCategoryController();
        $providerController = new ServicesProviderController();
        $warehouseController = new ServicesWarehouseController();
        $paymentController = new ServicesPaymentController();

        $data_category = $categoryController->getAllCategoryByStatus('enabled');
        $data_provider = $providerController->getAllProviderByStatus('enabled');
        $data_product = $productController->getAllProductByStatus('enabled');
        $data_warehouse = $warehouseController->getAllWarehouseByStatus('enabled');
        $data_payment = $paymentController->getAllPaymentByStatus('enabled');

        $payments = [];
        if($data_payment['data']!=null)
        $payments = $data_payment['data']->collection;

        $categories = [];
        if($data_category['data']!=null)
            $categories = $data_category['data']->collection;

        $providers = [];
        if($data_provider['data']!=null)
            $providers = $data_provider['data']->collection;
        
        $products = [];
        if($data_product['data']!=null)
            $products = $data_product['data']->collection;

        $warehouses = [];
        if($data_warehouse['data']!=null)
            $warehouses = $data_warehouse['data']->collection;
        
        return view(
            'admin/bill_order_management/add_bill_order',
            [
                'products' => $products,
                'categories' => $categories,
                'warehouses' => $warehouses,
                'payments' => $payments,
                'providers' => $providers
            ]
        );
    }

    public function saveBillOrder(Request $req){
        if(!$req->id_provider){
            return back()->withErrors('errors',"Vui lòng chọn nhà cung cấp!");
        }
        $billOrderController = new ServicesBillOrderController();

        $billOrderDetailController = new ServicesBillOrderDetailController();

        $warehouseDetailController = new ServicesWarehouseDetailController();

        // var_dump($req->dataProduct);die();

        $totalPrice = 0;
        $totalQuantity = 0;
        foreach($req->dataProduct as $product){
            $totalPrice = $totalPrice + ((int)$product['price']*(int)$product['quantity']);
            $totalQuantity += $product['quantity'];
        }

        $reqBillOrder = new Request([
            'id_user'=>Auth::user()->id_user,
            'id_provider'=>$req->id_provider,
            'id_payment'=>$req->id_payment,
            'id_warehouse'=>$req->id_warehouse,
            'total_price'=>(double)$totalPrice,
            'total_quantity'=>$totalQuantity
        ]);

        
        $data_billOrder = $billOrderController->saveBillOrder($reqBillOrder);
        $billOrder = [];
        if($data_billOrder['data']!=null)
            $billOrder = $data_billOrder['data'];

        $billOrderDetail = [];
        foreach($req->dataProduct as $key => $product){
            $reqBillOrderDetail = new Request([
                'id_bill_order'=> $billOrder->id_bill_order,
                'id_product'=>$product['id_product'],
                'purchase_price'=>$product['price'],
                'total_price'=>($product['price']*$product['quantity']),
                'quantity'=>$product['quantity']
            ]);
            $data_billOrderDetail = $billOrderDetailController->saveBillOrderDetail($reqBillOrderDetail);
            if($data_billOrderDetail['data']!=null)
                $billOrderDetail[$key] = $data_billOrderDetail['data'];
        }

        $warehouseDetail = [];
        foreach($req->dataProduct as $key => $product){
            $reqWarehouseDetail = new Request([
                'id_warehouse'=>$req->id_warehouse,
                'id_product'=>$product['id_product'],
                'price_pay'=>$product['price'] + ($product['price']*0.2),
                'total_price'=>($product['price'] + ($product['price']*0.2))*$product['quantity'],
                'quantity'=>$product['quantity']
            ]);
            $data_warehouseDetail = $warehouseDetailController->saveWarehouseDetail($reqWarehouseDetail);
            if($data_warehouseDetail['data']!=null)
                $warehouseDetail[$key] = $data_warehouseDetail['data'];
        }
        
        
        return redirect()->route('bill-order-management');
    }
}