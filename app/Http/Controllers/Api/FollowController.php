<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Res;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PaginateResource;
use Symfony\Component\HttpFoundation\Response;

class FollowController extends Controller
{
    public function index(Request $request)
    {
        //?------------- Check Role (Admin) --------------
        if (!$request->user()->tokenCan('admin')) {
            return response(['message' => 'Access denied!'], Response::HTTP_FORBIDDEN);
        }

        //?-------------------- Body ---------------------
        // $data = Streak::with('xp');
        $data = new Follow;
        if ($request->s) {
            $data = $data->where('id', $request->s)
                ->orWhere('namaUser', 'LIKE', '%' . $request->s . '%')
                ->orWhere('email', 'LIKE', '%' . $request->s . '%')
                ->orWhere('joined_at', 'LIKE', '%' . $request->s . '%');
        }

        if ($request->sortBy && in_array($request->sortBy, ['id', 'joined_at'])) {
            $sortBy = $request->sortBy;
        } else {
            $sortBy = 'followers_id'; // * Default
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
    public function store(Request $request, $id)
    {
        //?-------------------- Body ---------------------
        // $request->validate([
        //     'followers_id'=> 'required|integer',
        //     'following_id'=> 'required|integer',
        // ]);
        if ($request->user()->id == $id)
            return Response()->json(['message' => 'id must not same as the current user'], 422);
        if (!User::find($id))
            return Response()->json(['message' => 'user not found'], 404);
        $data = Follow::where('followers_id', $request->user()->id)->where('following_id', $id)->first();
        if ($data)
            return Response()->json(['message' => 'data already added'], 422); //? data found

        $data = new Follow([
            'followers_id' => $request->user()->id,
            'following_id' => $id,
        ]);
        $data->save();

        //?------------------ Response ---------------------
        if (!$data) return Res::autoResponse($data, 'AF'); //? register failed
        return Res::autoResponse($data, 'AS');
    }

    public function following($id)
    {
        //?-------------------- Body --------------------- alternative on Model
        $id = User::where('namaUser',$id)->first();
        if (!$id) return Res::autoResponse($id, 'NF'); //? data not found
        $data = Follow::where('followers_id', $id->id)->with(['following', 'followingXp'])->get();

        //?------------------ Response ---------------------
        if (!$data) return Res::autoResponse($data, 'NF'); //? data not found
        if ($data->isEmpty()) return Res::autoResponse($data, 'E');
        return Res::autoResponse($data, 'F');
    }
    public function followers($id)
    {
        //?-------------------- Body --------------------- alternative 2
        $id = User::where('namaUser',$id)->first();
        if (!$id) return Res::autoResponse($id, 'NF'); //? data not found
        $data = Follow::where('following_id', $id->id)
            ->with(['followers:id,nama,namaUser,avatar', 'followersXp:user_id,totalXp'])
            ->get();

        //?------------------ Response ---------------------
        if (!$data) return Res::autoResponse($data, 'NF'); //? data not found
        if ($data->isEmpty()) return Res::autoResponse($data, 'E');
        return Res::autoResponse($data, 'F');
    }

    public function destroy(Request $request, $id)
    {
        //?---------- Check Role (Self & Admin) ----------
        // if ($request->user()->id != $id && !$request->user()->tokenCan('admin')) {
        //     return response(['message' => 'Access denied!'], Response::HTTP_FORBIDDEN);
        // }

        //?-------------------- Body ---------------------
        $data = Follow::where('followers_id', $request->user()->id)->where('following_id', $id);

        $get = $data->first();
        if (!$get) return Res::autoResponse($data, 'NF'); //? data not found

        $data->delete();
        return Res::autoResponse($get, 'DS');
    }
}
