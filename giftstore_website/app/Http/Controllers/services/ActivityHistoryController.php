<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ActivityHistories;
use App\Http\Payload;
use App\Http\Resources\ActivityHistoryResource;
// use Illuminate\Notifications\Action;

class ActivityHistoryController extends Controller
{
    public function getAllActivityHistoryByStatus($id)
    {
        $activitiesHistory = ActivityHistories::where('id_activity_history', $id)->get();
        if($activitiesHistory->isEmpty())
        {
            return Payload::toJson(null, 'Data Not Found', 404);
        }
        return Payload::toJson(ActivityHistoryResource::collection($activitiesHistory), 'Ok', 200);
    }

    public function store(Request $request)
    {
        $activitiesHistory = new ActivityHistories();
        $activitiesHistory->fill([
            'id_activity_history' => $request->id_activity_history, 
            'id_user' => $request->id_user, 
            'activity' => $request->activity, 
            'type' => $request->type
        ]);
        if($activitiesHistory->save() == 1){
            $activitiesHistory = ActivityHistories::where('id_activity_history', $activitiesHistory->id_activity_history)->first();
            return Payload::toJson(new ActivityHistoryResource($activitiesHistory), 'Completed', 201);
        }
        return Payload::toJson(null, 'Uncompleted', 500);
    }
    public function update(Request $request)
    {
        $activitiesHistory = ActivityHistories::where('id_activity_history', $request->id_activity_history)
        ->update([
            'id_user' => $request->id_user, 
            'activity' => $request->activity, 
            'type' => $request->type
        ]);
        if($activitiesHistory == 1){
            return Payload::toJson($activitiesHistory, 'Completed', 200);
        }
        return Payload::toJson($activitiesHistory, 'Uncompleted', 500);
    }
    public function destroy($id)
    {
        $activitiesHistory = ActivityHistories::where('id_activity_history', $id)->first();
        if($activitiesHistory)
        {
            $activitiesHistory = ActivityHistories::where('id_activity_history', $id)->delete();
            return Payload::toJson(new ActivityHistoryResource($activitiesHistory), "Remove Successfully", 202);
        }
        return Payload::toJson(null, "Cannot Deleted!", 500);
    }
}
