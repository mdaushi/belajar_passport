<?php

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

Route::middleware('auth:api')->group(function(){
    Route::post('artikel', 'api\ArtikelController@post');
    Route::get('artikel', 'api\ArtikelController@get');
    Route::put('artikel/{id}', 'api\ArtikelController@put');
    Route::delete('artikel/{id}', 'api\ArtikelController@delete') ;

    Route::post('kategori', 'api\KategoriController@post');
    Route::get('kategori', 'api\KategoriController@get');
    

});

Route::post('register', 'auth\RegisterController@register');
Route::post('token', 'auth\AuthController@token');
