<?php

use App\Http\Controllers\Admin\CargaController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EstatuController;
use App\Http\Controllers\Admin\IncidenciaController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MisAsignadasController;
use App\Http\Controllers\Admin\MisIncidenciaController;
use App\Http\Controllers\Admin\ModoController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\UserController;
// use App\Http\Controllers\EstatuController;
use App\Models\Estatu;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

// DB::listen(function($query){
//     echo "<pre> {$query->sql} </pre>";

// });

// dd(User::first()->toArray());
Route::get('admin', function(){
    return 'Hi! admin';
});

Route::get('', [HomeController::class, 'index'])/* ->middleware('can:admin.home') */->name('admin.home');

Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');

Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');

Route::resource('subcategories', SubcategoryController::class)->except('show')->names('admin.subcategories');

// Route::resource('modos', ModoController::class)->except('show')->names('admin.modos');
Route::resource('estatus', EstatuController::class)->except('show')->names('admin.estatus');

Route::get('incidencias/{incidencia}/atender',  [IncidenciaController::class,  'atender'])->name('admin.incidencias.atender');
Route::put('incidencias/{incidencia}/asignar',  [IncidenciaController::class,  'asignar'])->name('admin.incidencias.asignar');
Route::get('incidencias/{incidencia}/resolver', [IncidenciaController::class, 'resolver'])->name('admin.incidencias.resolver');
Route::resource('incidencias', IncidenciaController::class)->names('admin.incidencias');

Route::resource('mis-incidencias', MisIncidenciaController::class)->except('show')->names('admin.mis-incidencias');
Route::resource('mis-asignadas', MisAsignadasController::class)->except('show')->names('admin.mis-asignadas');

Route::resource('cargas', CargaController::class)->names('admin.cargas');
Route::get('cargas/{carga}/download', [CargaController::class, 'download'])->name('admin.cargas.download');