<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quest;
use App\Models\QuestUser;

class QuestController extends Controller
{
    public function quest(Request $request)
    {
        // $quests = Quest::all();
        // $index = 0;
        // foreach ($quests as $quest) {
        //     $data[$index]['id'] = $quest->id;
        //     $data[$index]['quest_name'] = $quest->quest_name;
        //     $data[$index]['reward'] = $quest->reward;
        //     $data[$index]['quest_category'] = $quest->quest_category;

        //     $questUser = QuestUser::where('user_id', $request->user()->id)->where('quest_id', $quest->id)->first();
        //     $data[$index]['isReached'] = $questUser ? true : false;
        //     $index++;
        // }

        $questUser = QuestUser::where('user_id', $request->user()->id)->get();
        if ($questUser->isNotEmpty()) {
            if (today()->format('d') !== $questUser[0]->created_at->format('d')) {
                $questUser = QuestUser::where('user_id', $request->user()->id);
                $questUser->delete();
                $questUser = $questUser->get();
            }
        }
        if ($questUser->isEmpty()) {
            $quest = Quest::inRandomOrder()->limit(3)->get();
            $index = 0;
            foreach ($quest as $value) {
                $questUser[$index] = QuestUser::create([
                    "user_id" => $request->user()->id,
                    "quest_id" => $value->id,
                ]);
                $index++;
            }
        }

        $index = 0;
        foreach ($questUser as $qu) {
            $data['user_id'] = $qu['user_id'];
            // $quest = Quest::find($qu->quest_id, ['quest_name', 'requitment']);
            $quest = Quest::find($qu->quest_id);
            $data['quest'][$index] = $quest;
            $index++;
        }

        // return response()->json($questUser);
        return response()->json($data);
    }
}
