<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\MagasinController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\LoginController;

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

// Route::get('/login')->controller(UserController::class, 'login')->name('login');
Route::match(['post', 'options'], '/login',[LoginController::class, 'login']);

Route::prefix('/user_back')->controller(UserController::class)->group(function (){
    Route::get('/{limit}/{search?}','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('store','store')->name('store');
    Route::put('update/{id}','update')->name('update');
    Route::get('show/{id}','show')->name('show');
    Route::get('destroy/{id}','destroy')->name('destroy');
});

Route::prefix('/categ_back')->controller(CategorieController::class)->group(function(){
    Route::get('/show/{id}','show')->name('show');
    Route::get('/{limit}/{search?}','index')->name('index');
    Route::post('/store','store')->name('store');
    Route::put('/update/{id}','update')->name('update');
    Route::delete('/destroy/{id}','destroy')->name('destroy');
});

Route::prefix('/magasin_back')->controller(MagasinController::class)->group(function(){
    Route::get('/show/{id}','show')->name('show');
    Route::get('/create','create')->name('create');
    Route::get('/{limit}/{search?}','index')->name('index');
    Route::post('/store','store')->name('store');
    Route::put('/update/{id}','update')->name('update');
    Route::delete('/destroy/{id}','destroy')->name('destroy');
});

Route::prefix('/article_back')->controller(ArticleController::class)->group(function(){
    Route::get('/show/{id}','show')->name('show');
    Route::get('/{limit}/{search?}','index')->name('index');
    Route::post('/store','store')->name('store');
    Route::put('/update/{id}','update')->name('update');
    Route::delete('/destroy/{id}','destroy')->name('destroy');
});

Route::prefix('/operation_back')->controller(OperationController::class)->group(function(){
    Route::get('/show/{id}','show')->name('show');
    Route::get('/{limit}/{search?}','index')->name('index');
    Route::get('getAjaxArticle/{magasin}/{search}','getAjaxArticle')->name('getArticle');
    Route::post('/store','store')->name('store');
    Route::put('/update/{id}','update')->name('update');
    Route::delete('/destroy/{id}','destroy')->name('destroy');
});
