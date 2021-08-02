<?php

use App\Http\Controllers\LoginController;
use App\Http\Livewire\CustomersEdit;
use App\Http\Livewire\CustomersTable;
use App\Http\Livewire\ProductosEdit;
use App\Http\Livewire\ProductosTable;
use App\Http\Livewire\StocksEdit;
use App\Http\Livewire\StocksTable;
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

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');
//Productos
Route::get('/listar_productos', [ProductosTable::class, 'listar_productos']);//->middleware('auth:sanctum');
Route::post('/listar_productos_filtro', [ProductosTable::class, 'listar_productos_filtro'])->middleware('auth:sanctum');
Route::post('/guardar_productos', [ProductosEdit::class, 'guardar_productos']);
Route::put('/actualizar_productos', [ProductosEdit::class, 'actualizar_productos']);
Route::delete('eliminar_productos', [ProductosEdit::class, 'eliminar_productos']);
//Clientes
Route::get('/listar_clientes', [CustomersTable::class, 'listar_clientes']);
Route::post('/guardar_clientes', [CustomersEdit::class, 'guardar_clientes']);
Route::put('/actualizar_clientes', [CustomersEdit::class, 'actualizar_clientes']);
Route::delete('eliminar_clientes', [CustomersEdit::class, 'eliminar_clientes']);
//Almacenes
Route::get('/listar_almacenes', [StocksTable::class, 'listar_almacenes']);
Route::post('/guardar_almacenes', [StocksEdit::class, 'guardar_almacenes']);
Route::put('/actualizar_almacenes', [StocksEdit::class, 'actualizar_almacenes']);
Route::delete('eliminar_productos', [StocksEdit::class, 'eliminar_almacenes']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
