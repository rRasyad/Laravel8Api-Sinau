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

Route::get('public-user/{id}', [UserController::class, 'showPublic']); //?OK
Route::get('avatar/{filename}', [UserController::class, 'getAvatar']); //?OK
Route::apiResource('xps', XpController::class)->only(['show']); //?Ok
Route::get('following/{id}', [FollowController::class, 'following']); //? Ok
Route::get('followers/{id}', [FollowController::class, 'followers']); //? Ok
// Route::get('content', [ContentController::class, 'content']);
Route::get('content', [ContentController::class, 'content']); //? Ok
// Route::post('calculation', [ContentController::class, 'calculation']);
Route::apiResource('ranks', RankController::class)->only(['show']);

//? System
// Route::apiResource('xps', XpController::class)->only(['store']);//! this will be auto created when user created
Route::get('reset-dailyxp', [XpController::class, 'resetDaily']); //?Ok
Route::get('reset-weeklyxp', [XpController::class, 'resetWeekly']); //?Ok

Route::get('symlink', function () {
    $target = $_SERVER['DOCUMENT_ROOT'] . "/../project/laravel8api-sinau/storage";
    $link = $_SERVER['DOCUMENT_ROOT'] . "/../api.sinau-bahasa.my.id/storage";
    if (symlink($target, $link)) {
        echo "OK.";
    } else {
        echo "Gagal.";
    }
}); //?Ok

Route::get('slinks', function () {
    if (Artisan::call('storage:link')) {
        echo "OK.";
    } else {
        echo "Gagal.";
    }
});

Route::delete('ranks', [RankController::class, 'reset']);
Route::apiResource('ranks', RankController::class)->only(['store']); //! must triggered by xp
// Route::apiResource('streaks', StreakController::class)->only(['store']); //! must triggered by xp
// Route::apiResource('follows', FollowController::class)->only(['store']); //! this will be auto created when user created

//? Private
Route::group(['middleware' => ['auth:sanctum', 'ability:user,admin']], function () {
    Route::apiResource('users', UserController::class)->only(['show', 'destroy']); //?OK
    Route::post('users/{id}', [UserController::class, 'update']); //?OK
    Route::apiResource('xps', XpController::class)->only(['update']); //?OK
    Route::apiResource('streaks', StreakController::class)->only(['show']); //?Ok
    Route::get('follow/{id}', [FollowController::class, 'store']); //? Ok
    Route::get('unfollow/{id}', [FollowController::class, 'destroy']); //? Ok
    Route::get('mapel', [ContentController::class, 'mapel']); //? Ok
});

//? Admin
Route::group(['middleware' => ['auth:sanctum', 'abilities:admin']], function () {
    Route::apiResource('users', UserController::class)->only(['index']);
    Route::apiResource('xps', XpController::class)->only(['index']);
    Route::apiResource('streaks', StreakController::class)->only(['index']);
    Route::apiResource('follows', FollowController::class)->only(['index']);
    Route::apiResource('ranks', RankController::class)->only(['index']);
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    // Route::apiResource('users', UserController::class)->except(['store']);//? Ok
    // Route::apiResource('ranks', RankController::class)->except(['show']);//? Ok
    // Route::delete('ranks', [RankController::class, 'reset'])->name('reset');//? maybe Ok, need to check again later
    // Route::apiResource('streaks', StreakController::class);//? Ok
    Route::apiResource('quests', QuestController::class);
    Route::apiResource('unit-studies', UnitStudyController::class);
    Route::apiResource('studies', StudyController::class);
    // Route::apiResource('xps', XpController::class);//? Ok,the store need to check again later
    // Route::apiResource('follows', FollowController::class);
    Route::apiResource('achievements', AchievementController::class);
    Route::apiResource('lingots', LingotController::class);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
