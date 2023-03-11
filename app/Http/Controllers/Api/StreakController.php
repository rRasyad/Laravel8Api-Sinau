<?php

namespace App\Http\Controllers\Api;

use DateTime;
use Carbon\Carbon;
use App\Helpers\Res;
use App\Models\Streak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PaginateResource;
use Symfony\Component\HttpFoundation\Response;

class StreakController extends Controller
{
    public function index(Request $request)
    {
        //?------------- Check Role (Admin) --------------
        if (!$request->user()->tokenCan('admin')) {
            return response(['message' => 'Access denied!'], Response::HTTP_FORBIDDEN);
        }

        //?-------------------- Body ---------------------
        // $data = Streak::with('xp');
        $data = new Streak;
        if ($request->s) {
            $data = $data->where('id', $request->s)
                ->orWhere('namaUser', 'LIKE', '%' . $request->s . '%')
                ->orWhere('email', 'LIKE', '%' . $request->s . '%')
                ->orWhere('joined_at', 'LIKE', '%' . $request->s . '%');
        }

        if ($request->sortBy && in_array($request->sortBy, ['id', 'joined_at'])) {
            $sortBy = $request->sortBy;
        } else {
            $sortBy = 'id'; // * Default
        }

        if ($request->sortOrder && in_array($request->sortOrder, ['asc', 'desc'])) {
            $sortOrder = $request->sortOrder;
        } else {
            $sortOrder = 'desc'; // * Default
        }

        if ($request->perPage) {
            $perPage = $request->perPage;
        } else {
            $perPage = 25; // * Default
        }

        if ($request->paginate) {
            $data = $data->orderBy($sortBy, $sortOrder)->paginate($perPage);
            // $data = $data->orderBy($sortBy, $sortOrder)->simplePaginate($perPage);
            return new PaginateResource($data);
        } else {
            $data = $data->orderBy($sortBy, $sortOrder)->get(); // * Default
        }

        //?------------------ Response ---------------------
        if (!$data) return Res::autoResponse($data, 'FF'); //? data not found
        if ($data->isEmpty()) return Res::autoResponse($data, 'E'); //? data is empty
        return Res::autoResponse($data, 'FS');
    }
    public function store(Request $request)
    {
        //?---------- Check Role (Self & Admin) ----------special case
        // if ($request->user()->id != $request->user_id && !$request->user()->tokenCan('admin')) {
        //     return response(['message' => 'Access denied!'], Response::HTTP_FORBIDDEN);
        // }

        //?-------------------- Body ---------------------
        $request->validate([
            'tanggalStreak' => 'nullable',
            'user_id'       => 'required',
            'coldStreak'    => 'nullable',
            'streakBesok'   => 'nullable',
        ]);

        // $data = Streak::where('user_id', $request->user_id)->get();
        $dataY = Streak::where('user_id', $request->user_id)
            ->latest('tanggalStreak')
            ->first(); //? get yesterday's data recorded

        if (!$dataY) {
            $data = Streak::create($request->all());
            if (!$data) return Res::autoResponse($data, 'AF');
            return Res::autoResponse($data, 'AS');
        }

        $dateY = (int)$dataY->tanggalStreak->format('d'); //? replace to yesterday's actual date

        $dataT = Streak::create($request->all());
        $dataT = Streak::where('user_id', $request->user_id)
            ->latest('tanggalStreak')
            ->first(); //? get today's data recorded
        $dateT = (int)$dataT->tanggalStreak->format('d'); //? replace to today's actual date

        if ($dateY == $dateT - 1) {
            $dataY->streakBesok = $dataT->id;
            $dataY->save();

            return response()->json([
                'status' => Res::MSGA_ADDED_SUCCESS[1],
                'message' => Res::MSGA_ADDED_SUCCESS[0] + ' Data successfully binded!',
                'data yesterday' => $dataY,
                'data now' => $dataT
            ]);
        }

        return response()->json([
            'status' => Res::MSGA_ADDED_SUCCESS[1],
            'message' => Res::MSGA_ADDED_SUCCESS[0] + ' Data is Unrelated!',
            'data yesterday' => $dataY,
            'data now' => $dataT
        ]);
    }
    public static function autoStore($user_id)
    {
        //?---------- Check Role (Self & Admin) ----------special case
        // if ($request->user()->id != $request->user_id && !$request->user()->tokenCan('admin')) {
        //     return response(['message' => 'Access denied!'], Response::HTTP_FORBIDDEN);
        // }

        //?-------------------- Body ---------------------
        // $request->validate([
        //     'tanggalStreak' => 'nullable',
        //     'user_id'       => 'required',
        //     'coldStreak'    => 'nullable',
        //     'streakBesok'   => 'nullable',
        // ]);

        $dataAcuan = Streak::where('user_id', $user_id)
            ->latest('tanggalStreak')
            ->first(); //? get data recorded before create a new record

        if (!$dataAcuan) { //? if data not found, then create new
            $data = Streak::create(['user_id' => $user_id]);
            if (!$data) return 'Streak Failed To Add';
            return 'Success, The first day user learns something';
        }

        $acuan = $dataAcuan->tanggalStreak->format('d'); //? replace variable to only date
        // FIXED buat hari kemarin dan sekarang
        if ($acuan === today()->format('d')) return 'Streak already added';

        $dataNew = Streak::create(['user_id' => $user_id]);

        if ($acuan === Carbon::yesterday()->format('d')) {
            $dataAcuan->update(['streakBesok' => $dataNew->id]);
            return 'Success, Streak successfully binded!';
        }
        return 'Success, Streak is Unrelated!';
    }

    public function show(Request $request, $id)
    {
        //?---------- Check Role (Self & Admin) ----------
        if ($request->user()->id != $id && !$request->user()->tokenCan('admin')) {
            return response(['message' => 'Access denied!'], Response::HTTP_FORBIDDEN);
        }

        //?-------------------- Body ---------------------
        // $data = null;
        // $data = Streak::where('user_id', $id)
        //     ->with([
        //         'xp' => function ($query) {
        //             $query->select(['xpHarian']);
        //         }
        //     ])->latest('tanggalStreak')->get();

        // $data = Streak::where('user_id', $id)
        //     ->with('xp')->latest('tanggalStreak')->get();
        // $data = $data->map(function ($query) {
        //     return collect(['xpHarian' => $query->xpHarian]);
        // });

        $bulan = $request->bulan;
        // $data = Streak::where('user_id', $id)->latest('tanggalStreak')->get();
        // $data = Streak::where('user_id', $id)->latest('tanggalStreak')->paginate(5)
        //     ->groupBy(function ($month) {
        //         return $month->tanggalStreak->format('M');
        //     });
        $data = Streak::where('user_id', $id)->whereMonth('tanggalStreak', $bulan)->get();

        //?------------------ Response ---------------------
        if (!$data) return Res::autoResponse($data, 'NF'); //? data not found
        if ($data->isEmpty()) return Res::autoResponse($data, 'E');
        return Res::autoResponse($data, 'F');
        // $data = $data->paginate(30);
        // return new PaginateResource($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        //?------------- Check Role (Admin) --------------
        if (!$request->user()->tokenCan('admin')) {
            return response(['message' => 'Access denied!'], 403);
        }

        //?-------------------- Body ---------------------
        $request->validate([
            'tanggalStreak' => 'nullable',
            'user_id'       => 'nullable',
            'coldStreak'    => 'nullable',
            'streakBesok'   => 'nullable',
        ]);
        $data = Streak::find($id);
        if (!$data) return Res::autoResponse($data, 'UF'); //? data not found

        $data->update($request->all());
        return Res::autoResponse($data, 'US');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy(Request $request, $id)
    {
        //?------------- Check Role (Admin) --------------
        if (!$request->user()->tokenCan('admin')) {
            return response(['message' => 'Access denied!'], 403);
        }

        //?-------------------- Body ---------------------
        $data = Streak::find($id);
        if (!$data) return Res::autoResponse($data, 'DF'); //? data not found

        $data->delete();
        return Res::autoResponse($data, 'DS');
    }
}
