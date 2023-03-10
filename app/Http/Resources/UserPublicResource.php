<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use App\Helpers\Res;
use Illuminate\Http\Resources\Json\JsonResource;

class UserPublicResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'status' => Res::MSGA_FOUND[1],
            'message' => Res::MSGA_FOUND[0],
            'data' => [
                "id"        => $this->id,
                "avatar"    => $this->avatar,
                "nama"      => $this->nama,
                "namaUser"  => $this->namaUser,
                "joined_at" => Carbon::parse($this->created_at)->format('d F Y'),
                // "liga"      => $this->rank->liga,
                "total_streak" => $this->streak_count,
                "total_following" => $this->following_count,
                "total_followers" => $this->followers_count,
                "xp"        => $this->xp,
            ]
        ];
    }

    //? WORK
    // public function toArray($request)
    // {
    //     return [
    //         'status' => Res::MSGA_FOUND[1],
    //         'message' => Res::MSGA_FOUND[0],
    //         'data' => [
    //             "id"        => $this->id,
    //             "avatar"    => $this->avatar,
    //             "nama"      => $this->nama,
    //             "namaUser"  => $this->namaUser,
    //             "email"     => $this->email,
    //             "created_at"=> $this->created_at,
    //             "xp"        => $this->xp->only('totalXp'),
    //         ]
    //     ];
    // }

    public function withResponse($request, $response)
    {
        $jsonResponse = json_decode($response->getContent(), true);
        unset($jsonResponse['data']['xp']['user_id']);
        $response->setContent(json_encode($jsonResponse));
    }
}
