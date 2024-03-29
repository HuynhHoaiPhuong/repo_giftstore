<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\ProviderController as ServicesProviderController;

class ProviderController extends Controller
{
    public function providerManagement(){
        $providerController = new ServicesProviderController();
        $data_provider = $providerController->getAllProvider();
        $providers = [];
        if($data_provider['data']!=null)
            $providers = $data_provider['data']->collection;
        return view('admin/provider_management/provider_management', ['providers' => $providers]);
    }

    public function addProvider(Request $req){
        $providerController = new ServicesProviderController();
        if($req->name==null){
            return back()->withErrors('error','Tạo thất bại');
        }
        $result = $providerController->saveProvider($req);
        if($result==null){
            return back()->withErrors('error','Tạo thất bại');
        }
        return redirect(route('provider-management'));
    }
}
