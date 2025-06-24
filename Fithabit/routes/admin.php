<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UsersAdminController;
use App\Http\Controllers\Admin\SuscripcionesAdminController;
use App\Http\Controllers\Admin\TiposSuscripcionesAdminController;
use App\Http\Controllers\Admin\ReservasAdminController;
use App\Http\Controllers\Admin\ProductosAdminController;
use App\Http\Controllers\Admin\PedidosAdminController;
use App\Http\Controllers\Admin\HabitosAdminController;

Route::group(['middleware' => ['admin']], function () {

    Route::get('', [AdminController::class, 'index']);

    //Usuarios rutas

    Route::resource('/usuarios', UsersAdminController::class);

    Route::delete('/usuarios/{id}', [UsersAdminController::class, 'destroy'])->name('usuarios.destroy');

    //Suscripciones rutas

    Route::resource('/suscripciones', SuscripcionesAdminController::class);

    Route::resource('/tiposSuscripciones', TiposSuscripcionesAdminController::class);

    //Reservas rutas

    Route::resource('/reservas', ReservasAdminController::class);

    //Productos rutas

    Route::resource('/productos', ProductosAdminController::class);

    Route::get('/productos/create', [ProductosAdminController::class, 'create'])->name('productos.create');

    Route::post('/productos', [ProductosAdminController::class, 'store'])->name('productos.store');

    Route::delete('/productos/{id}', [ProductosAdminController::class, 'destroy'])->name('productos.destroy');

    Route::get('/productos/{id}/edit', [ProductosAdminController::class, 'edit'])->name('productos.edit');

    Route::put('/productos/{id}', [ProductosAdminController::class, 'update'])->name('productos.update');

    //Pedidos rutas

    Route::resource('/pedidos', PedidosAdminController::class);

    Route::delete('/pedidos/{id}', [PedidosAdminController::class, 'destroy'])->name('pedidos.destroy');

    //Hábtitos rutas

    Route::resource('/habitos', HabitosAdminController::class);

});

