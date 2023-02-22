<?php

namespace App\Http\Controllers\Api;

use App\Models\Xp;
use Carbon\Carbon;
use App\Helpers\Res;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        //?-------------------- Body ---------------------
        $request->validate([
            'nama'      => 'nullable',
            'namaUser'  => 'required|unique:users,namaUser',
            'email'     => 'nullable|email|unique:users,email',
            'password'  => 'required|confirmed|min:5|max:20',
        ]);

        if (!$request->nama) $nama = 'user';
        else $nama = $request->nama;

        $data = new User([
            'nama'      => $nama,
            'namaUser'  => $request->namaUser,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);
        $data->save();
        $xp = new Xp(['user_id' => $data->id]);
        $xp->save();

        $data = User::with('xp')->find($data->id);
        $dToken = null; //? register without token
        // $dToken = $data->createToken('User', ['user']); //? register with token

        //?------------------ Response ---------------------
        if (!$data) return Res::autoResponse($data, 'REGF', $dToken); //? register failed
        return Res::autoResponse($data, 'REGS', $dToken);
    }

    public function login(Request $request)
    {
        //?-------------------- Body ---------------------
        $request->validate([
            'emailOrUser'   => 'required',
            'password'      => 'required'
        ]);

        $data = User::where('email', $request->emailOrUser)
            ->orWhere('namaUser', $request->emailOrUser)->with('xp')->first();

        if (!$data || !Hash::check($request->password, $data->password)) {
            return response(['message' => 'Bad cred'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        // $dToken = null; //? login without token
        //? Below this is Login with token
        if ($data->role == 'admin') $dToken = $data->createToken('Admin', ['admin']);
        else $dToken = $data->createToken('User', ['user']);

        //?------------------ Response ---------------------
        if (!$data) return Res::autoResponse($data, 'LINF', $dToken); //? register failed
        return Res::autoResponse($data, 'LINS', $dToken);

        // * [3] third reference with params admin
        // if ($request->admin) $dToken = $data->createToken('Admin', ['admin']);
        // else $dToken = $data->createToken('User', ['user']);

        // * [2] second reference with special id
        // if ($data->id == 1) {
        //     $dToken = $data->createToken('Admin', ['admin']);
        //     // * [2] Second Reference to make a expired Token
        //     // $accessToken = $dToken->accessToken;
        //     // $accessToken->expires_at = Carbon::now()->addMinute();
        //     // $accessToken->save();
        //     // $expires = Carbon::parse($accessToken->expires_at)->toTimeString();
        //     // $token = $dToken->plainTextToken;
        // } else {
        //     $dToken = $data->createToken('User', ['user']);
        // }

        // if ($data) {
        //     return TokenResponse::createTokenResponse($data, 3, $dToken);
        // } else {
        //     return TokenResponse::createTokenResponse($data, 4);
        // }

        // * [1] First Reference to make a expired Token
        // $tokenResult = $data->createToken('user-access');
        // $token = $tokenResult->token;
        // $token->expires_at = Carbon::now()->addWeeks(1);
        // $token->save();

        // return response()->json([
        //     'data' => [
        //         'user' => Auth::user(),
        //         'access_token' => $tokenResult->accessToken,
        //         'token_type' => 'Bearer',
        //         'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateString()
        //     ]
        // ]);
    }

    public function logout(Request $request)
    {
        //?-------------------- Body ---------------------
        // Auth::user()->tokens()->delete(); //? Reference to revoke token
        $request->user()->currentAccessToken()->delete();

        //?------------------ Response ---------------------
        if (!$request) return Res::autoResponse(null, 'LOUTF'); //? register failed
        return Res::autoResponse(null, 'LOUTS');
    }
}
