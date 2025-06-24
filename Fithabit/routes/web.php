<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Suscription_TypeController;
use App\Http\Controllers\Habit_ListController;


use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| TODO
|--------------------------------------------------------------------------
|
|   Cambiar los nombres de las rutas al castellano
|
*/
Route::group(['middleware' => ['suscriber']], function () {

    Route::group(['middleware' => ['language']], function () {

        Route::group(['middleware' => ['user']], function () {

            Route::resource('/lista_habitos', App\Http\Controllers\Habit_ListController::class);

            //Habit_list metodos eliminar y actualizar
            Route::put('/lista_habitos/update/{id}', [App\Http\Controllers\Habit_ListController::class, 'update'])->name('lista_habitos.update');
            Route::delete('/lista_habitos/destroy/{id}', [App\Http\Controllers\Habit_ListController::class, 'destroy'])->name('lista_habitos.destroy');

            Route::put('/lista_habitos/actualizarContador/{id}' , [App\Http\Controllers\Habit_ListController::class, 'actualizarContador'])->name('lista_habitos.actualizarContador');

            Route::get('/addHabito', [App\Http\Controllers\Habit_ListController::class, 'addHabito'])->name("addHabito");

            Route::post('/add-habit', [App\Http\Controllers\HabitController::class, 'addHabitToList'])->name('add.habit');

            Route::resource('/qr', App\Http\Controllers\QRController::class);

        });

        Route::get('/inicio', function () {
            return view("index.index");
        })->name("inicio");

        Route::resource('/usuario', App\Http\Controllers\UserController::class);

        Route::resource('/orden', App\Http\Controllers\OrderController::class);

        Route::post('/delete-account', [UserController::class, 'deleteAccount'])->name('delete-account');

        Route::resource('/menu', App\Http\Controllers\MenuController::class);

        Route::resource('/restaurante', App\Http\Controllers\RestauranteController::class);

        Route::resource('/reserva', App\Http\Controllers\ReservationController::class);

        Route::resource('/informacion', App\Http\Controllers\legalInformationController::class);

        Route::resource('/tipo_suscripcion', App\Http\Controllers\Suscription_TypeController::class);

        Route::resource('/detalle_orden', App\Http\Controllers\Order_DetailController::class);

        Route::get('/addProduct/{idProduct}', [ App\Http\Controllers\MenuController::class, "addProduct"]);

        Route::get('/deleteProduct/{idProduct}', [ App\Http\Controllers\MenuController::class, "deleteProduct"] );

        Route::post('/perfil/upload-image', [App\Http\Controllers\UserController::class, 'uploadImage'])->name('perfil.uploadImage');

        Route::get('/crear-suscripcion', [App\Http\Controllers\SuscriptionController::class, 'crearSuscripcion'])->name('crear.suscripcion');

        //Cambio de idioma
        Route::get('idioma/{locale}', [App\Http\Controllers\LanguageController::class, 'setLanguage'])->name('setLanguage');

    });

});

Route::get('/', function () {
        return view('auth.login');
    }) -> name("home");

Route::post('/seleccionar-plan', [Suscription_TypeController::class, 'seleccionarPlan'])->name('seleccionar.plan');

Route::resource('/planes', App\Http\Controllers\PlanController::class);

Auth::routes();
