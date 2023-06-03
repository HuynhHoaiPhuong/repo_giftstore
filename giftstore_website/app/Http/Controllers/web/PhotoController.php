<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\PhotoController as ServicesPhotoController;

class PhotoController extends Controller
{
    public function photoManagement(){
        $photoController = new ServicesPhotoController();
        $data_photo = $photoController->getAllPhoto();
        $photos = [];
        if($data_photo['data']!=null)
        $photos = $data_photo['data']->collection;
        return view('admin/photo_management/photo_management',['photos'=>$photos]);
    }
}
