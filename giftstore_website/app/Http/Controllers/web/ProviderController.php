<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function providerManagement(){
        return view('admin/provider_management/provider_management');
    }
}
