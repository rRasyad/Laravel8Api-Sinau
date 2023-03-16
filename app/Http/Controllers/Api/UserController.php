<?php

namespace App\Http\Controllers\Api;

use App\Models\Xp;
use App\Helpers\Res;
use App\Models\User;
use App\Models\Follow;
use App\Models\Streak;
use App\Models\UnitUser;
use App\Models\SoalSession;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
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
        $data = User::with('xp');
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
        // if ($request->user()->id != $id && !$request->user()->tokenCan('admin')) {
        //     return response(['message' => 'Access denied!'], Response::HTTP_FORBIDDEN);
        // }

        //?-------------------- Body ---------------------
        // $data = User::find($id)->with('xp')->first();
        // $data = User::find($id)->xp()->first();
        // $data = User::with('xp')->find($id)->first();
        $data = User::with('xp')->withCount(['streak', 'following', 'followers'])->find($id);
        // $data = User::find($id,['avatar']);
        $data['isFriend'] = (Follow::where([
            ['followers_id', $request->user()->id],
            ['following_id', $id]
        ])->exists()) ? true : false;

        //?------------------ Response ---------------------
        if (!$data) return Res::autoResponse($data, 'NF'); //? data not found
        return Res::autoResponse($data, 'F');
    }

    public function showPublic($id)
    {
        //?-------------------- Body ---------------------
        // $data = User::where('id', $id)->with('xp', 'rank')->first();//! kurang achievement
        // $data = User::with('xp', 'rank')->find($id);
        $data = User::with('xp')->withCount(['streak', 'following', 'followers'])->find($id);
        // $data = User::with('xp')->withCount(['streak', 'following', 'followers'])->find($id);

        //?------------------ Response ---------------------
        if (!$data) return Res::autoResponse($data, 'NF'); //? data not found
        return new UserPublicResource($data);
    }

    public function search(Request $request)
    {
        $value = $request->s;
        if (!$value) return response()->json(['message' => 'you must fill value!'], 404);
        $data = User::where('nama', 'LIKE', '%' . $value . '%')
            ->orWhere('namaUser', 'LIKE', '%' . $value . '%')
            ->orWhere('email', 'LIKE', '%' . $value . '%');
        if ($data->get()->isEmpty()) return Res::autoResponse($data, 'E');

        $r = [];
        $count = 0;
        $index = 0;
        foreach ($data->get() as $key) {
            if ($key['role'] !== 'system') {
                $r[$index]['id'] = $key['id'];
                $r[$index]['avatar'] = $key['avatar'];
                $r[$index]['nama'] = $key['nama'];
                $r[$index]['namaUser'] = $key['namaUser'];
                $r[$index]['isFriend'] = (Follow::where([
                    ['followers_id', $request->user()->id],
                    ['following_id', $key['id']]
                ])->exists()) ? true : false;
                $count++;
            }
            $index++;
        }
        if (!$r) return Res::autoResponse($data, 'E');
        return response()->json([
            'status' => 200,
            'message' => 'data found',
            'data_count' => $count,
            // 'data' => $data->get(['id', 'avatar', 'nama', 'namaUser']),
            'data' => $r,
        ]);
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
        // if (!Storage::exists('images/avatars/' . $filename)) {
        //     return Respon::make('File not found!', Res::MSGA_NOT_FOUND[1]);
        // }
        // if (!file_exists(public_path() . "\\storage\\images\\avatars\\" . $filename)) {
        //     return Respon::make('File not found!', Res::MSGA_NOT_FOUND[1]);
        // }
        // $storagePath = public_path() . "\\storage\\images\\avatars\\" . $filename;
        // echo public_path();
        // return Image::make($storagePath)->resize(460, 460)->response();

        //?------------------------ Check file exist | manual method | Web Version
        // $storagePath = $_SERVER['DOCUMENT_ROOT'] . "/storage/images/avatars/" . $filename;
        // if (!file_exists($storagePath)) {
        //     return Respon::make('File not found!', Res::MSGA_NOT_FOUND[1]);
        // }
        // echo $storagePath;

        //?------------------------ Check file exist | Storage method | Web Version
        if (!Storage::disk('image')->exists('avatars/' . $filename)) {
            return Respon::make('File not found!', Res::MSGA_NOT_FOUND[1]);
        }
        // echo Storage::disk('image')->path('avatars/28_1676401588.png');
        // $storagePath = Storage::disk('image')->path('avatars/' . $filename);
        $storagePath = Storage::path('images/avatars/' . $filename);
        // echo $storagePath;

        //?------------------------ Conclusion --------------------------------
        //? disk('disk_name') to custom where file location
        //? If we use Storage we can set disk location in config/filesystem.php

        //? public_path() => /home/sinausch/project/laravel8api-sinau/public
        //? (this is laravel8api-sinau project folder)

        return Image::make($storagePath)->resize(460, 460)->response();
    }

    public function changePassword(Request $request)
    {
        $id = $request->user()->id;
        $request->validate([
            'current_password' => 'required',
            'new_password' => "required|min:5|unique:users,password,{$id}",
        ]);
        $data = User::find($id);

        if (!Hash::check($request->current_password, $data->password)) {
            return response()->json(["message" => "password doesn't match!"], 404);
        }
        if (Hash::check($request->new_password, $data->password)) {
            return response()->json(["message" => "password must be different!"], 404);
        }

        $data->update(["password" => Hash::make($request->new_password)]);
        return response()->json(["message" => "password changed successfully!"]);
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
            'namaUser'  => 'nullable|alpha_dash|unique:users,namaUser',
            'email'     => 'nullable|email:rfc,dns|unique:users,email',
            // 'password'  => 'nullable|min:5|max:20'
        ]);

        $data = User::find($id);
        if (!$data) return Res::autoResponse($data, 'NF'); //? data not found

        // $data->update($request->except(['avatar','namaUser']));
        if (isset($request->nama) && !$request->nama == '') {
            $data->nama = $request->nama;
        }
        if (isset($request->namaUser) && !$request->namaUser == '') {
            $data->namaUser = $request->namaUser;
        }
        if (isset($request->email) && !$request->email == '') {
            $data->email = $request->email;
        }
        if ($request->file('avatar')) {
            //?------------------------ Work on Local
            // if ($data->avatar != null) {
            //     $file_old = public_path() . "\\storage\\images\\avatars\\" . $data->avatar;
            //     unlink($file_old);
            // }
            // $extension = $request->file('avatar')->getClientOriginalExtension();
            // // $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            // // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // // $avatar = $filename.'_'.time().'.'.$extension;
            // $avatar = $id . '_' . time() . '.' . $extension;
            // $request->file('avatar')->storeAs('images/avatars', $avatar);
            // $data->avatar = $avatar;

            //?------------------------ Work on Web
            // $path = $_SERVER['DOCUMENT_ROOT'] . "/storage/images/avatars/";
            // $path = "/images/avatars/"; //?for public
            if ($data->avatar != null) {
                $just_name = explode("/", $data->avatar);
                // if (file_exists($path . $just_name[5])) {
                //     echo 'this is exist';
                //     $file_old = $path . $just_name[5];
                //     unlink($file_old);
                // }

                // //? if use https://api.sinau-bahasa.my.id/api/avatar/
                // if (Storage::disk('image')->exists('avatars/' . $just_name[5])) {
                //     // echo 'this is exist';
                //     $file_old = Storage::path('images/avatars/' . $just_name[5]);
                //     unlink($file_old);
                //     // echo $file_old;
                // }

                //? if use https://api.sinau-bahasa.my.id/avatar/
                if (Storage::disk('image')->exists('avatars/' . $just_name[4])) {
                    // echo 'this is exist';
                    $file_old = Storage::path('images/avatars/' . $just_name[4]);
                    unlink($file_old);
                    // echo $file_old;
                }
            }

            //?------------------------ Work on Web
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $img_name = $id . '_' . time() . '.' . $extension;
            $request->file('avatar')->storeAs('avatars/', $img_name, 'image');
            // $data->avatar = 'https://api.sinau-bahasa.my.id/api/avatar/' . $img_name;
            $data->avatar = 'https://img.sinau-bahasa.my.id/avatar/' . $img_name;
        }
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

        //?------------------------ Local
        // if ($data->avatar != null) {
        //     $file_old = public_path() . "\\storage\\images\\avatars\\" . $data->avatar;
        //     unlink($file_old);
        // }
        //?------------------------ Web
        if ($data->avatar != null) {
            $just_name = explode("/", $data->avatar);
            // if (Storage::disk('image')->exists('avatars/' . $just_name[5])) {
            //     $file_old = Storage::path('images/avatars/' . $just_name[5]);
            //     unlink($file_old);
            // }
            if (Storage::disk('image')->exists('avatars/' . $just_name[4])) {
                $file_old = Storage::path('images/avatars/' . $just_name[4]);
                unlink($file_old);
            }
        }
        Xp::where('user_id', $id)->delete();
        UnitUser::where('user_id', $id)->delete();
        $Streak = Streak::where('user_id', $id);
        (!$Streak || $Streak->isEmpty()) ?: $Streak->delete();
        $SoalSession = SoalSession::where('user_id', $id);
        (!$SoalSession || $SoalSession->isEmpty()) ?: $SoalSession->delete();
        $Follow = Follow::where('followers_id', $id);
        (!$Follow || $Follow->isEmpty()) ?: $Follow->delete();
        $Follow = Follow::where('following_id', $id);
        (!$Follow || $Follow->isEmpty()) ?: $Follow->delete();

        // $data->tokens()->where('tokenable_id', $data->$id)->delete(); //? alt delete token by userId
        DB::table('personal_access_tokens')->where('tokenable_id', $id)->delete(); //? delete token
        $data->delete();
        return Res::autoResponse($data, 'DS');
    }
}
