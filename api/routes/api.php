<?php


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Post\CreatePostController;
use App\Http\Controllers\Post\PostsController;
use App\Http\Controllers\Post\RemovePostController;
use App\Http\Controllers\Post\UpdatePostController;
use App\Http\Controllers\User\Picture\CreateProfilePictureController;
use App\Http\Controllers\User\Picture\RemoveProfilePictureController;
use App\Http\Controllers\User\Picture\ShowProfilePicturesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::post('/inscription', [RegisterController::class, 'register']);
Route::post('/connexion', [LoginController::class, 'login'])->name('login');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/posts', [PostsController::class, 'index'])->name('index');

    Route::post('/profile-picture',[CreateProfilePictureController::class, 'store'])
        ->name('create.picture.profile');
    Route::get('/profile-pictures/{profileId}',[ShowProfilePicturesController::class, 'index'])
        ->name('show.profile.pictures');
    Route::post('/profile-picture/remove/{id}',[RemoveProfilePictureController::class, 'remove'])
        ->name('remove.profile.picture');

    Route::post('/post', [CreatePostController::class, 'store'])
        ->name('create.post');
    Route::put('/post/{id}', [UpdatePostController::class, 'update'])
        ->name('update.post');
    Route::post('/post/remove/{id}',[RemovePostController::class, 'remove'])
        ->name('remove.post');

    //Route::group(['prefix' => 'posts'], function() {});
});


/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

