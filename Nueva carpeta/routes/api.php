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
// Route::post('/libro/crear','LibrosController@crearLibro');
// Route::post('/libro/prestar','LibroPrestadoController@crearPrestamo');
// Route::put('/libro/{id}/editar','LibrosController@editarLibro');
// Route::put('/libro/prestar/{user_id}/{libro_id}/editar','LibroPrestadoController@editarPrestamo');
// Route::delete('/libro/{id}/borrar','LibrosController@borrarLibro');
Route::middleware('auth:api')->post('/libro/crear','LibrosController@crearLibro');
Route::middleware('auth:api')->post('/libro/prestar','LibroPrestadoController@crearPrestamo');
Route::middleware('auth:api')->put('/libro/{id}/editar','LibrosController@editarLibro');
Route::middleware('auth:api')->put('/libro/prestar/{id}/editar','LibroPrestadoController@editarPrestamo');
Route::middleware('auth:api')->delete('/libro/{id}/borrar','LibrosController@borrarLibro');
Route::middleware('auth:api')->post('/create','RegisterController@create');