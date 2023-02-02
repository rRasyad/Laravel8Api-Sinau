<?php

namespace App\Helpers;

use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;

class Res
{
    public const MSGA_FETCHED_SUCCESS = ['Data fetched successfully!', Response::HTTP_OK];
    public const MSGA_FETCHED_FAIL = ['Data failed to fetch!', Response::HTTP_BAD_REQUEST];
    public const MSGA_ADDED_SUCCESS = ['Data successfully added!', Response::HTTP_CREATED];
    public const MSGA_ADDED_FAIL = ['Data failed to add!', Response::HTTP_UNPROCESSABLE_ENTITY];
    public const MSGA_FOUND = ['Data found!', Response::HTTP_FOUND];
    public const MSGA_NOT_FOUND = ['Data not found!', Response::HTTP_NOT_FOUND];
    public const MSGA_UPDATED_SUCCESS = ['Data updated successfully!', Response::HTTP_OK];
    public const MSGA_UPDATED_FAIL = ['Data failed to update!', Response::HTTP_NOT_FOUND];
    public const MSGA_DELETED_SUCCESS = ['Data deleted successfully!', Response::HTTP_OK];
    public const MSGA_DELETED_FAIL = ['Data failed to delete!', Response::HTTP_NOT_FOUND];
    public const MSGA_RESET_SUCCESS = ['Reset data successfully!', Response::HTTP_OK];
    public const MSGA_RESET_FAIL = ['Failed to reset data!', Response::HTTP_NOT_FOUND];
    public const MSGA_EMPTY = ['Data is empty!', Response::HTTP_OK];
    public const MSGT_REGISTER_SUCCESS = ['Register success!', Response::HTTP_CREATED];
    public const MSGT_REGISTER_FAIL = ['Register failed!', Response::HTTP_UNPROCESSABLE_ENTITY];
    public const MSGT_LOGIN_SUCCESS = ['Login success!', Response::HTTP_OK];
    public const MSGT_LOGIN_FAIL = ['Login failed!', Response::HTTP_UNAUTHORIZED];
    public const MSGT_LOGOUT_SUCCESS = ['Logout success!', Response::HTTP_OK];
    public const MSGT_LOGOUT_FAIL = ['Logout failed!', Response::HTTP_BAD_REQUEST];

    protected static $response = [
        'status'    => null,
        'message'   => null,
        'data'      => null,
    ];

    protected static $tResponse = [
        'status'    => null,
        'message'   => null,
        'data'      => null,
        'access'      => [
            'token'     => null,
            'expires_at' => null,
            'type'      => null,
            'role'      => null,
            'abilities' => null,
        ],
    ];

    public static function autoResponse($data = null, $res = null, $dtoken = null)
    {
        if (!$dtoken) {
            switch ($res) {
                case 'FS':
                    $status = Res::MSGA_FETCHED_SUCCESS[1];
                    $message = Res::MSGA_FETCHED_SUCCESS[0];
                    break;
                case 'FF':
                    $status = Res::MSGA_FETCHED_FAIL[1];
                    $message = Res::MSGA_FETCHED_FAIL[0];
                    break;
                case 'AS':
                    $status = Res::MSGA_ADDED_SUCCESS[1];
                    $message = Res::MSGA_ADDED_SUCCESS[0];
                    break;
                case 'AF':
                    $status = Res::MSGA_ADDED_FAIL[1];
                    $message = Res::MSGA_ADDED_FAIL[0];
                    break;
                case 'F':
                    $status = Res::MSGA_FOUND[1];
                    $message = Res::MSGA_FOUND[0];
                    break;
                case 'NF':
                    $status = Res::MSGA_NOT_FOUND[1];
                    $message = Res::MSGA_NOT_FOUND[0];
                    break;
                case 'US':
                    $status = Res::MSGA_UPDATED_SUCCESS[1];
                    $message = Res::MSGA_UPDATED_SUCCESS[0];
                    break;
                case 'UF':
                    $status = Res::MSGA_UPDATED_FAIL[1];
                    $message = Res::MSGA_UPDATED_FAIL[0];
                    break;
                case 'DS':
                    $status = Res::MSGA_DELETED_SUCCESS[1];
                    $message = Res::MSGA_DELETED_SUCCESS[0];
                    break;
                case 'DF':
                    $status = Res::MSGA_DELETED_FAIL[1];
                    $message = Res::MSGA_DELETED_FAIL[0];
                    break;
                case 'RS':
                    $status = Res::MSGA_RESET_SUCCESS[1];
                    $message = Res::MSGA_RESET_SUCCESS[0];
                    break;
                case 'RF':
                    $status = Res::MSGA_RESET_FAIL[1];
                    $message = Res::MSGA_RESET_FAIL[0];
                    break;
                case 'E':
                    $status = Res::MSGA_EMPTY[1];
                    $message = Res::MSGA_EMPTY[0];
                    break;
                case 'REGS':
                    $status = Res::MSGT_REGISTER_SUCCESS[1];
                    $message = Res::MSGT_REGISTER_SUCCESS[0];
                    break;
                case 'REGF':
                    $status = Res::MSGT_REGISTER_FAIL[1];
                    $message = Res::MSGT_REGISTER_FAIL[0];
                    break;
                case 'LINS':
                    $status = Res::MSGT_LOGIN_SUCCESS[1];
                    $message = Res::MSGT_LOGIN_SUCCESS[0];
                    break;
                case 'LINF':
                    $status = Res::MSGT_LOGIN_FAIL[1];
                    $message = Res::MSGT_LOGIN_FAIL[0];
                    break;
                case 'LOUTS':
                    $status = Res::MSGT_LOGOUT_SUCCESS[1];
                    $message = Res::MSGT_LOGOUT_SUCCESS[0];
                    break;
                case 'LOUTF':
                    $status = Res::MSGT_LOGOUT_FAIL[1];
                    $message = Res::MSGT_LOGOUT_FAIL[0];
                    break;

                default:
                    $status = null;
                    $message = null;
                    break;
            }

            self::$response = [
                'status'    => $status,
                'message'   => $message,
                'data'      => $data,
            ];
            return response()->json(self::$response, self::$response['status']);
        }

        switch ($res) {
            case 'REGS':
                $status = Res::MSGT_REGISTER_SUCCESS[1];
                $message = Res::MSGT_REGISTER_SUCCESS[0];
                break;
            case 'REGF':
                $status = Res::MSGT_REGISTER_FAIL[1];
                $message = Res::MSGT_REGISTER_FAIL[0];
                break;
            case 'LINS':
                $status = Res::MSGT_LOGIN_SUCCESS[1];
                $message = Res::MSGT_LOGIN_SUCCESS[0];
                break;
            case 'LINF':
                $status = Res::MSGT_LOGIN_FAIL[1];
                $message = Res::MSGT_LOGIN_FAIL[0];
                break;

            default:
                $status = null;
                $message = null;
                break;
        }

        $accessToken = $dtoken->accessToken;
        //? ---------- case if the token have expired date -------------
        // $accessToken->expires_at = Carbon::now()->addMinute();
        // $accessToken->save();

        if (!$accessToken->expires_at) $expiresAt = null;
        else $expiresAt = Carbon::parse($accessToken->expires_at)->locale('en')->diffForHumans([
            'parts' => 3,
            'join' => true,
            'short' => true,
        ]);
        // else $expiresAt = Carbon::parse($accessToken->expires_at)->toTimeString();

        self::$tResponse = [
            'status'    => $status,
            'message'   => $message,
            'data'      => $data,
            'access'      => [
                'token'     => $dtoken->plainTextToken,
                'expires_at' => $expiresAt,
                'type'      => 'Bearer',
                'role'      => $accessToken->name,
                'abilities' => $accessToken->abilities,
            ],
        ];
        // self::$tResponse['auth'] = [
        //     'token'     => $dtoken->plainTextToken,
        //     'expires_at'=> $expiresAt,
        //     'type'      => 'Bearer',
        //     'role'      => $accessToken->name,
        //     'abilities' => $accessToken->abilities,
        // ];
        // self::$tResponse['status'] = $status;
        // self::$tResponse['message'] = $message;
        // self::$tResponse['data'] = $data;
        return response()->json(self::$tResponse, self::$tResponse['status']);
    }
}
