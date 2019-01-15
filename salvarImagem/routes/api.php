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
//o diretorio dever ser localhost/api já que estamos utilizando o arquivo api para definir as rotas em vez do arquivo web
Route::get('/','control@index');
//Após o cadastro ele será redicerionado para essa rota
Route::post('/envioImagem','control@salvarImagem');

