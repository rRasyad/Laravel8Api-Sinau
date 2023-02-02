<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Res;
use App\Models\User;
use Intervention\Image\Facades\Image;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\PaginateResource;
use App\Http\Resources\UserPublicResource;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Response as Respon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        //?------------- Check Role (Admin) --------------
        // if (!$request->user()->tokenCan('admin')) {
        //     return response(['message' => 'Access denied!'], Response::HTTP_FORBIDDEN);
        // }

        //?-------------------- Body ---------------------
        $data = User::with('xp', 'rank');
        // $data = User::all('id','role');
        if ($request->s) {
            $data = $data->where('id', $request->s)
                ->orWhere('namaUser', 'LIKE', '%' . $request->s . '%')
                ->orWhere('email', 'LIKE', '%' . $request->s . '%')
                ->orWhere('joined_at', 'LIKE', '%' . $request->s . '%');
        }

        if ($request->sortBy && in_array($request->sortBy, ['id', 'joined_at'])) {
            $sortBy = $request->sortBy;
        } else {
            $sortBy = 'id'; // ? Default
        }

        if ($request->sortOrder && in_array($request->sortOrder, ['asc', 'desc'])) {
            $sortOrder = $request->sortOrder;
        } else {
            $sortOrder = 'desc'; // ? Default
        }

        if ($request->perPage) {
            $perPage = $request->perPage;
        } else {
            $perPage = 25; // ? Default
        }

        if ($request->paginate) {
            $data = $data->orderBy($sortBy, $sortOrder)->paginate($perPage); // ? Paginate
            // $data = $data->orderBy($sortBy, $sortOrder)->simplePaginate($perPage); // ? SimplePaginate
            return new PaginateResource($data);
        } else {
            $data = $data->orderBy($sortBy, $sortOrder)->get(); // ? Default
        }

        //?------------------ Response ---------------------
        if (!$data) return Res::autoResponse($data, 'FF'); //? data not found
        if ($data->isEmpty()) return Res::autoResponse($data, 'E'); //? data is empty
        return Res::autoResponse($data, 'FS');
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
        // $data = User::find($id)->with('xp')->first();
        // $data = User::find($id)->xp()->first();
        // $data = User::with('xp')->find($id)->first();
        // $data = User::where('id', $id)->with('xp', 'rank')->first();
        $data = User::find($id,['avatar']);

        //?------------------ Response ---------------------
        if (!$data) return Res::autoResponse($data, 'NF'); //? data not found
        return Res::autoResponse($data, 'F');
    }

    public function showPublic($id)
    {
        //?-------------------- Body ---------------------
        // $data = User::where('id', $id)->with('xp', 'rank')->first();//! kurang achievement
        // $data = User::with('xp', 'rank')->find($id);
        $data = User::with('xp', 'rank')->find($id);

        //?------------------ Response ---------------------
        if (!$data) return Res::autoResponse($data, 'NF'); //? data not found
        return new UserPublicResource($data);
    }

    public function getAvatar($filename)
    {
        //?------------------------ works alt 1
        // if (!Storage::exists('images/avatars/'.$filename)) {
        //     return Respon::make('File not found!', Res::MSGA_NOT_FOUND[1]);
        // }
        // $file = Storage::get('images/avatars/'.$filename);
        // $type = Storage::mimeType('images/avatars/'.$filename);
        // $response = Respon::make($file, 200)->header("Content-Type", $type);
        // return $response;

        //?------------------------ works alt 2
        // $storagePath = public_path() . "\\storage\\images\\avatars\\" . $filename;
        // $storagePath = storage_path('app\public\images\avatars\\' . $filename);
        // return response()->file($storagePath);
        // return response()->file($pathToFile, $headers); //? referensi

        //?------------------------ works alt 2
        if (!Storage::exists('images/avatars/' . $filename)) {
            return Respon::make('File not found!', Res::MSGA_NOT_FOUND[1]);
        }
        $storagePath = public_path() . "\\storage\\images\\avatars\\" . $filename;
        return Image::make($storagePath)->resize(460, 460)->response();
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
            return response(['message' => 'Access denied!'], Response::HTTP_FORBIDDEN);
        }

        //?-------------------- Body ---------------------
        $request->validate([
            'avatar'    => 'nullable|image|file|max:1024',
            'nama'      => 'nullable',
            'namaUser'  => 'nullable|unique:users,namaUser',
            'email'     => 'nullable|email|unique:users,email',
            'password'  => 'nullable|min:5|max:20'
        ]);

        $data = User::find($id);
        if (!$data) return Res::autoResponse($data, 'NF'); //? data not found

        $data->update($request->except(['avatar']));
        if ($request->file('avatar')) {
            if ($data->avatar != null) {
                $file_old = public_path() . "\\storage\\images\\avatars\\" . $data->avatar;
                unlink($file_old);
            }
            $extension = $request->file('avatar')->getClientOriginalExtension();
            // $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // $avatar = $filename.'_'.time().'.'.$extension;
            $avatar = $id . '_' . time() . '.' . $extension;
            $request->file('avatar')->storeAs('images/avatars', $avatar);
            $data->avatar = $avatar;
        }
        $data->password = Hash::make($request->password);
        $data->save();
        return Res::autoResponse($data, 'US');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy(Request $request, $id)
    {
        //?---------- Check Role (Self & Admin) ----------
        if ($request->user()->id != $id && !$request->user()->tokenCan('admin')) {
            return response(['message' => 'Access denied!'], Response::HTTP_FORBIDDEN);
        }

        //?-------------------- Body ---------------------
        $data = User::find($id);
        if (!$data) return Res::autoResponse($data, 'NF'); //? data not found

        if ($data->avatar != null) {
            $file_old = public_path() . "\\storage\\images\\avatars\\" . $data->avatar;
            unlink($file_old);
        }
        // $data->tokens()->where('tokenable_id', $data->$id)->delete(); //? alt delete token by userId
        DB::table('personal_access_tokens')->where('tokenable_id', $id)->delete(); //? delete token
        $data->delete();
        return Res::autoResponse($data, 'DS');
    }
}
