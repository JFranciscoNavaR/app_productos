<?php

use App\Http\Livewire\ProductosEdit;
use App\Http\Livewire\ProductosTable;
use App\Http\Livewire\UsersEdit;
use App\Http\Livewire\UsersTable;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ReporteController;
use App\Http\Livewire\Admin\UsersIndex;
use App\Http\Livewire\CategoriesEdit;
use App\Http\Livewire\CategoriesTable;
use App\Http\Livewire\CustomersEdit;
use App\Http\Livewire\CustomersTable;
use App\Http\Livewire\Index;
use App\Http\Livewire\InventoriesEdit;
use App\Http\Livewire\InventoriesProductosTable;
use App\Http\Livewire\InventoriesTable;
use App\Http\Livewire\StatusEdit;
use App\Http\Livewire\StatusTable;
use App\Http\Livewire\StocksTable;
use App\Http\Livewire\StocksEdit;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['auth:sanctum', 'verified'])
    ->get('/', Index::class)
    ->name('inicio');

/*Rutas de Productos*/
Route::get('/Productos', ProductosTable::class)
    ->middleware('auth')
    ->name('productos');

Route::get('/Producto/editar/{id}', ProductosEdit::class)
    ->middleware('auth')
    ->where('id', '[0-9]+')
    ->name('producto.edit');

Route::get('/Producto/eliminar/{ideliminar}', ProductosEdit::class)
    ->middleware(['auth', 'verificarR'])
    ->where('ideliminar', '[0-9]+')
    ->name('producto.delete');

Route::get('/Producto/new', ProductosEdit::class)
    ->middleware('auth')
    ->name('producto.new');

Route::get('/Producto/Reporte', [ReporteController::class, 'reporteProductos'])
    ->middleware('auth')
    ->name('productos.file');

Route::get('/Producto/Reporte/Compilar', [ReporteController::class, 'compilarReporte'])
    ->middleware('auth')
    ->name('productos.file.compile');

/*Formatos 'pdf', 'rtf', 'xls', 'xlsx', 'docx', 'odt', 'ods', 'pptx', 'csv', 'html', 'xhtml', 'xml', 'jrprint' */

/*Rutas de Clientes*/
Route::get('/Clientes', CustomersTable::class)
    ->middleware('auth')
    ->name('customers');

Route::get('/Cliente/editar/{id}', CustomersEdit::class)
    ->middleware('auth')
    ->where('id', '[0-9]+')
    ->name('customer.edit');

Route::get('/Cliente/eliminar/{ideliminar}', CustomersEdit::class)
    ->middleware('auth')
    ->where('ideliminar', '[0-9]+')
    ->name('customer.delete');

Route::get('/Cliente/new', CustomersEdit::class)
    ->middleware('auth')
    ->name('customer.new');

/*Rutas de Usuarios */
Route::get('/Usuarios', UsersIndex::class)
    ->middleware('auth')
    ->name('users');

Route::resource('users', UserController::class)->only(['edit', 'update'])
    ->middleware('auth')
    ->names('admin.users');

/*Rutas de Almacenes */
Route::get('/Almacenes', StocksTable::class)
    ->middleware('auth')
    ->name('stocks');

Route::get('/Almacen/editar/{id}', StocksEdit::class)
    ->middleware('auth')
    ->where('id', '[0-9]+')
    ->name('stock.edit');

Route::get('/Almacen/eliminar/{ideliminar}', StocksEdit::class)
    ->middleware('auth')
    ->where('ideliminar', '[0-9]+')
    ->name('stock.delete');

Route::get('/Almacen/new', StocksEdit::class)
    ->middleware('auth')
    ->name('stock.new');

/*Rutas de Inventarios */
Route::get('Almacen/{idver}/Inventarios/ver', InventoriesTable::class)
    ->middleware('auth')
    ->name('inventories.show');

Route::get('/Almacen/{idver}/Inventario/editar/{id}', InventoriesEdit::class)
    ->middleware('auth')
    ->where('id', '[0-9]+')
    ->name('inventory.edit');

Route::get('/Almacen/{idver}/Inventario/eliminar/{ideliminar}', InventoriesEdit::class)
    ->middleware('auth')
    ->where('ideliminar', '[0-9]+')
    ->name('inventory.delete');

Route::get('Almacen/{idver}/Inventario/new', InventoriesEdit::class)
    ->middleware('auth')
    ->name('inventory.new');

/*Rutas de Categoria*/
Route::get('/Categorias', CategoriesTable::class)
    ->middleware('auth')
    ->name('categories');

Route::get('/Categoria/editar/{id}', CategoriesEdit::class)
    ->middleware('auth')
    ->where('id', '[0-9]+')
    ->name('category.edit');

Route::get('/Categoria/eliminar/{ideliminar}', CategoriesEdit::class)
    ->middleware('auth')
    ->where('ideliminar', '[0-9]+')
    ->name('category.delete');

Route::get('/Categoria/new', CategoriesEdit::class)
    ->middleware('auth')
    ->name('category.new');

/*Rutas de Estatus */
Route::get('/Estatus', StatusTable::class)
    ->middleware('auth')
    ->name('status');

Route::get('/Estatu/editar/{id}', StatusEdit::class)
    ->middleware('auth')
    ->where('id', '[0-9]+')
    ->name('statu.edit');

Route::get('/Estatu/eliminar/{ideliminar}', StatusEdit::class)
    ->middleware('auth')
    ->where('ideliminar', '[0-9]+')
    ->name('statu.delete');

Route::get('/Estatu/new', StatusEdit::class)
    ->middleware('auth')
    ->name('statu.new');

/*Rutas de Inventarios con Productos */
Route::get('/Inventario/{idver}/Productos/ver', InventoriesProductosTable::class)
    ->middleware('auth')
    ->name('productos.show');