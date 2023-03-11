<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Api\XpController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RankController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\QuestController;
use App\Http\Controllers\Api\StudyController;
use App\Http\Controllers\Api\FollowController;
use App\Http\Controllers\Api\LingotController;
use App\Http\Controllers\Api\StreakController;
use App\Http\Controllers\Api\UnitStudyController;
use App\Http\Controllers\Api\AchievementController;
use App\Http\Controllers\Api\ContentController;
use App\Http\Middleware\AfterMiddleware;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//? Public
Route::post('register', [AuthController::class, 'register'])->name('register'); //? done with xp
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('unauthorized', function () {
    return response()->json(['message' => 'Unauthenticated'], 401);
})->name('unauthorized');

Route::get('a', [ContentController::class, 'a']);
Route::get('public-user/{id}', [UserController::class, 'showPublic']); //?OK
Route::get('avatar/{filename}', [UserController::class, 'getAvatar']); //?OK
Route::apiResource('xps', XpController::class)->only(['show']); //?Ok
Route::get('following/{id}', [FollowController::class, 'following']); //? Ok
Route::get('followers/{id}', [FollowController::class, 'followers']); //? Ok
Route::get('content', [ContentController::class, 'content']); //? Ok
Route::get('achievement', [AchievementController::class, 'achievement']); //? Ok
// Route::apiResource('ranks', RankController::class)->only(['show']);

//? System
Route::get('reset-dailyxp', [XpController::class, 'resetDaily']); //?Ok
Route::get('reset-weeklyxp', [XpController::class, 'resetWeekly']); //?Ok

// Route::delete('ranks', [RankController::class, 'reset']);
// Route::apiResource('ranks', RankController::class)->only(['store']); //! must triggered by xp

//? Private
Route::group(['middleware' => ['auth:sanctum', 'ability:user,admin', 'after.middleware']], function () {
    Route::apiResource('users', UserController::class)->only(['show', 'destroy']); //?OK
    Route::post('users/{id}', [UserController::class, 'update']); //?OK
    Route::post('change-password', [UserController::class, 'changePassword']); //?OK
    Route::apiResource('streaks', StreakController::class)->only(['show']); //?Ok
    Route::get('follow/{id}', [FollowController::class, 'store']); //? Ok
    Route::get('unfollow/{id}', [FollowController::class, 'destroy']); //? Ok
    Route::get('mapel', [ContentController::class, 'mapel']); //? Ok
    Route::get('quest', [QuestController::class, 'quest']); //? Ok
    Route::get('initial-session', [ContentController::class, 'initiation']); //? Ok
    Route::get('next-soal', [ContentController::class, 'nextSession']); //? Ok
});

//? Admin
Route::group(['middleware' => ['auth:sanctum', 'abilities:admin']], function () {
    Route::apiResource('users', UserController::class)->only(['index']);
    Route::apiResource('xps', XpController::class)->only(['index']);
    Route::apiResource('streaks', StreakController::class)->only(['index']);
    Route::apiResource('follows', FollowController::class)->only(['index']);
    // Route::apiResource('ranks', RankController::class)->only(['index']);

    Route::get('symlink', function () {
        $target = $_SERVER['DOCUMENT_ROOT'] . "/../project/Laravel8Api-Sinau/storage/app/public/images/avatars";
        $link = $_SERVER['DOCUMENT_ROOT'] . "/../public_html/avatar";
        (symlink($target, $link)) ? response()->json("OK.", 200) : response()->json("Gagal.", 404);
    }); //?Ok

    Route::get('slinks', function () {
        (Artisan::call('storage:link')) ? response("OK.", 200) : response("Gagal.", 404);
    });
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    // Route::apiResource('users', UserController::class)->except(['store']);//? Ok
    // Route::apiResource('ranks', RankController::class)->except(['show']);//? Ok
    // Route::delete('ranks', [RankController::class, 'reset'])->name('reset');//? maybe Ok, need to check again later
    // Route::apiResource('streaks', StreakController::class);//? Ok
    // Route::apiResource('quests', QuestController::class); //!
    // Route::apiResource('unit-studies', UnitStudyController::class);
    // Route::apiResource('studies', StudyController::class);
    // Route::apiResource('xps', XpController::class);//? Ok,the store need to check again later
    // Route::apiResource('follows', FollowController::class);
    // Route::apiResource('achievements', AchievementController::class); //!
    // Route::apiResource('lingots', LingotController::class); //!
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
