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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resources([
	'profissional' => 'API\ProfissionalController'
]);

Route::get('/get_cidades/{estado_id}', 'API\RequestController@get_cidades');
Route::get('/get_chart/', 'API\ProfissionalController@get_chartdata');
Route::get('/file_download/{id}', 'API\ProfissionalController@file_download');