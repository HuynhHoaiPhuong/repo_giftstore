<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index(){
        return view('admin/photo_management/all_photo');
    }
    public function addPhoto(){
        return view('admin/photo_management/add_photo');
    }
}
