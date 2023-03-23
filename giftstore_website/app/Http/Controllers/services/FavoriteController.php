<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Http\Payload;
use App\Http\Resources\FavoriteResource;

class FavoriteController extends Controller
{
    public function getAllFavoriteByStatus($status)
    {
        $favorites = Favorite::where('status', $status)->get();
        if($favorites->isEmpty())
        {
            return Payload::toJson(null, 'Data Not Found', 404);
        }
        return Payload::toJson(FavoriteResource::collection($favorites), 'Ok', 200);
    }

    public function store(Request $request)
    {
        $favorites = new Favorite();
        $favorites->fill([
            'id_favorite' => $request->id_favorite, 
            'id_product' => $request->id_product, 
            'id_member' => $request->id_member, 
            'status' => $request->status
        ]);
        if($favorites->save()==1){
            $favorites = Favorite::where('id_favorite', $favorites->id_favorite)->first();
            return Payload::toJson(new FavoriteResource($favorites), 'Completed', 201);
        }
        return Payload::toJson(null, 'Uncompleted', 500);
    }
    public function update(Request $request)
    {
        $favorites = Favorite::where('id_favorite', $request->id_favorite)
        ->update([
            'id_product' => $request->id_product, 
            'id_member' => $request->id_member, 
        ]);
        if($favorites == 1){
            return Payload::toJson($favorites, 'Completed', 200);
        }
        return Payload::toJson($favorites, 'Uncompleted', 500);
    }
    public function destroy($id)
    {
        $favorites = Favorite::where('id_favorite', $id)->first();
        if($favorites)
        {
            $favorites = Favorite::where('id_favorite', $id)->delete();
            return Payload::toJson(new FavoriteResource($favorites), "Remove Successfully", 202);
        }
        return Payload::toJson(null, "Cannot Deleted!", 500);
    }
}
