<?php

namespace App\Http\Controllers\Api;

use App\Models\AchievementUser;
use App\Models\Achievement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class AchievementController extends Controller
{
    public function achievement(Request $request)
    {
        $id = $request->id;
        if (!$id) return response()->json('you must fill id!');
        $limit = (int)$request->limit;
        ($limit)
            ? $achievements = Achievement::take($limit)->get()
            : $achievements = Achievement::all();
        $totalXp = User::find($id)->xp->totalXp;
        $index = 0;
        foreach ($achievements as $achievement) {
            $data['user_id'] = $id;
            $data['achievement'][$index]['id'] = $achievement->id;
            $data['achievement'][$index]['achievement_name'] = $achievement->name;
            $data['achievement'][$index]['description'] = $achievement->description;
            $data['achievement'][$index]['image'] = $achievement->image;
            $data['achievement'][$index]['required'] = $achievement->required;
            $data['achievement'][$index]['current_xp'] = $totalXp;
            $data['achievement'][$index]['isAchieved'] = ($totalXp >= $achievement->required) ? true : false;

            // $achievReached = AchievementUser::where('user_id', $id)->where('achievement_id', $achievement->id)->first();
            // $data['achievement'][$index]['isAchieved'] = ($achievReached) ? $achievReached->isAchieved : false;

            $index++;
        }

        // $achievUser = AchievUser::where('user_id', $id)->get();
        // $index = 0;
        // foreach ($achievUser as $value) {
        //     $data['user_id'] = $value->user_id;

        //     $achivement = Achievement::where('id', $value->achiev_id)->first();
        //     $data['achievement'][$index] = $achivement;

        //     $index++;
        // }

        return response()->json($data);
    }
}
