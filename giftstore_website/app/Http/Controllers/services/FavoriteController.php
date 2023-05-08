<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Http\Resources\FavoriteResource;
use App\Http\Payload;
use Carbon\Carbon;

class FavoriteController extends Controller
{
    public function getAllFavoriteByStatus($status)
    {
        $favorite = Favorite::where('status', $status)->get();
        if($favorite->isEmpty())
        {
            return Payload::toJson(null, 'Data Not Found', 404);
        }
        return Payload::toJson(FavoriteResource::collection($favorite), 'OK', 200);
    }

    public function saveFavorite(Request $request)
    {
        $favorite = new Favorite();
        $favorite->fill([
            'id_favorite' => "FAV".Carbon::now()->format('ymdhis').rand(1, 1000), 
            'id_product' => $request->id_product, 
            'id_member' => $request->id_member, 
        ]);
        if($favorite->save() == 1){
            $favorite = Favorite::where('id_favorite', $favorite->id_favorite)->first();
            return Payload::toJson(new FavoriteResource($favorite), 'Completed', 201);
        }
        return Payload::toJson(null, 'Uncompleted', 500);
    }
    public function updateFavorite(Request $request)
    {
        $result = Favorite::where('id_favorite', $request->id_favorite)
        ->update([
            'id_product' => $request->id_product, 
            'id_member' => $request->id_member, 
        ]);
        if($result == 1){
            $favorite = Favorite::where('id_favorite', $request->id_favorite)->first();
            return Payload::toJson(new FavoriteResource($favorite), "Completed", 201);
        }
        return Payload::toJson(null, 'Uncompleted', 500);
    }
    public function removeFavorite(Request $request)
    {
        $result = Favorite::where('id_favorite', $request->id_favorite)
        ->update(['status' => $request->status]);
        if($result == 1){
            $favorite = Favorite::where('id_favorite', $request->id_favorite)->first();
            return Payload::toJson(new FavoriteResource($favorite), "Completed", 201);
        }
        return Payload::toJson(null, "UnCompleted", 500);
    }
}
