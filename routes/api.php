<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('user/create', "UsuarioController@save");
Route::get('users/all', "UsuarioController@getUsuarios");
Route::get('user/get-user-by-document/{document}', "UsuarioController@getUsuarioByDocument");
Route::get('user/get-user-by-email/{email}', "UsuarioController@getUsuarioByEmail");
Route::delete('user/delete-by-document/{document}', "UsuarioController@deleteUsuarioByDocument");
Route::delete('user/delete-by-email/{email}', "UsuarioController@deleteUsuarioByEmail");
Route::put('user/update-by-document/{document}', "UsuarioController@updateByDocument");
Route::put('user/update-by-email/{email}', "UsuarioController@updateByEmail");