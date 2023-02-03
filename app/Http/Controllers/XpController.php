<?php

namespace App\Http\Controllers\Api;

use App\Models\Xp;
use App\Helpers\Res;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PaginateResource;
use Symfony\Component\HttpFoundation\Response;

class XpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        //?------------- Check Role (Admin) --------------
        if (!$request->user()->tokenCan('admin')) {
            return response(['message' => 'Access denied!'], Response::HTTP_FORBIDDEN);
        }

        //?-------------------- Body ---------------------
        $data = new Xp;
        if ($request->user_id) {
            $data = $data->where('user_id', $request->user_id);
        }

        if ($request->sortBy && in_array($request->sortBy, ['id', 'user_id'])) {
            $sortBy = $request->sortBy;
        } else {
            $sortBy = 'user_id'; // * Default
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
            return new PaginateResource($data);
        } else {
            $data = $data->orderBy($sortBy, $sortOrder)->get(); // * Default
        }

        //?------------------ Response ---------------------
        if (!$data) return Res::autoResponse($data, 'FF'); //? data not found
        if ($data->isEmpty()) return Res::autoResponse($data, 'E'); //? data is empty
        return Res::autoResponse($data, 'FS');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        //?---------- Check Role (Self & Admin) ----------special case
        if ($request->user()->id != $request->user_id && !$request->user()->tokenCan('admin')) {
            return response(['message' => 'Access denied!'], Response::HTTP_FORBIDDEN);
        }

        //?-------------------- Body ---------------------
        $request->validate([
            'user_id'   => 'required|integer|unique:xps,user_id',
            'xpHarian'  => 'nullable|integer',
            'xpMingguan'=> 'nullable|integer',
            'totalXp'   => 'nullable|integer',
        ]);

        $data = Xp::where('user_id', $request->user_id)->get();
        if ($data->isNotEmpty()) return Res::autoResponse($data, 'AF'); //? Data found

        $data = Xp::create($request->all());
        return Res::autoResponse($data, 'AS');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(Request $request, $id)
    {
        //?---------- Check Role (Self & Admin) ----------
        if ($request->user()->id != $id && !$request->user()->tokenCan('admin')) {
            return response(['message' => 'Access denied!'], Response::HTTP_FORBIDDEN);
        }

        //?-------------------- Body ---------------------
        // $data = Xp::find($id);
        $data = Xp::where('user_id',$id)->first();

        //?------------------ Response ---------------------
        if (!$data) return Res::autoResponse($data, 'NF'); //? data not found
        return Res::autoResponse($data, 'F');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        //?---------- Check Role (Self & Admin) ----------
        if ($request->user()->id != $id && !$request->user()->tokenCan('admin')) {
            return response(['message' => 'Access denied!'], 403);
        }

        //?-------------------- Body ---------------------
        $request->validate([
            'user_id'   => 'nullable|integer|unique:xps,user_id',
            'xpHarian'  => 'nullable|integer',
            'xpMingguan'=> 'nullable|integer',
            'totalXp'   => 'nullable|integer',
        ]);

        // $data = Xp::find($id);
        $data = Xp::where('user_id',$id);
        if (!$data) return Res::autoResponse($data, 'UF'); //? data not found

        $data->update($request->all());
        return Res::autoResponse($data->get(), 'US');
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
        } //! this will reset maybe? or this not to delete

        //?-------------------- Body ---------------------
        // $data = Xp::find($id);
        $data = Xp::where('user_id',$id);
        if (!$data) return Res::autoResponse($data, 'DF'); //? data not found

        $data->delete();
        return Res::autoResponse($data->get(), 'DS');
    }
    public function resetDaily()
    {

    }
    public function resetWeekly()
    {

    }
}
