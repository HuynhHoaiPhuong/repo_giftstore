<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function staticPageManagement(){
        return view('admin/static_page_management/add_static_page');
    }
}
