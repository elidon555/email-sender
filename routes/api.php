<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController\MailController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api'], function () {
    Route::prefix('mail/send')->group(function () {
        Route::group(['as' => 'mail.send.', 'middleware' => 'throttle:1000,1'], function () {
            Route::post('user-posts', [MailController::class, 'sendUserPostsMail'])->name('user.posts');
        });
    });
});
