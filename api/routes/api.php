<?php


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Post\CreatePostController;
use App\Http\Controllers\Post\PostsController;
use App\Http\Controllers\Post\RemovePostController;
use App\Http\Controllers\Post\UpdatePostController;
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
    Route::post('/post', [CreatePostController::class, 'store'])->name('create');
    Route::put('/post/{id}', [UpdatePostController::class, 'update'])->name('update');
    Route::post('/post/{id}',[RemovePostController::class, 'remove'])->name('remove');
    Route::get('/posts', [PostsController::class, 'index'])->name('index');
    //Route::group(['prefix' => 'posts'], function() {});
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

