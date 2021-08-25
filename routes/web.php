<?php

use App\Http\Controllers\FindUserController;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\UpdatePasswordController;
use App\Http\Controllers\UpdateProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/', function () {
        return view('auth.login');
    });

    Route::middleware('auth')->group(function () {;

        // TimeLine
        Route::get('/timeline', TimelineController::class)->name('timeline');
        //Route Status
        Route::post('status/create', [StatusController::class, 'store'])->name('status.create');

        // Find Users
        Route::get('find', FindUserController::class)->name('users.find');
        // search
        Route::post('find', [FindUserController::class, 'search'])->name('users.search');

        // Membuat Group route Profile
        Route::prefix('profile')->group(function() {
            // Membuat profil
            Route::get('{user}', ProfileController::class)->name('profile');

            // Edit atau update Profil
            Route::get('{user}/edit', [UpdateProfileController::class, 'edit'])->name('profile.edit');
            Route::put('update', [UpdateProfileController::class, 'update'])->name('profile.update');

            // Edit atau update Password
            Route::get('{user}/password', [UpdatePasswordController::class, 'edit'])->name('password');
            Route::put('update/password', [UpdatePasswordController::class, 'update'])->name('pass.update');

            // Membuat Following
            Route::get('{user}/following', [FollowingController::class, 'following'])->name('profile.following');
            // Membuat Follower
            Route::get('{user}/follower', [FollowingController::class, 'follower'])->name('profile.follower');
            // Button Follow
            Route::post('/{user}', [FollowingController::class, 'store'])->name('profile.follow');
        });

    });


    require __DIR__.'/auth.php';
