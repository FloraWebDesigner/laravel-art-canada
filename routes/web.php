<?php

use App\Models\Facility;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\FacilitiesController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProvidersController;
use App\Http\Controllers\ProvincesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'facilities' => Facility::all(),
    ]);
});

Route::get('/console/logout', [ConsoleController::class, 'logout'])->middleware('auth');
Route::get('/console/login', [ConsoleController::class, 'loginForm'])->middleware('guest');
Route::post('/console/login', [ConsoleController::class, 'login'])->middleware('guest');
Route::get('/console/dashboard', [ConsoleController::class, 'dashboard'])->middleware('auth');


Route::get('/console/facilities/list', [FacilitiesController::class, 'list'])->middleware('auth');
Route::get('/console/facilities/add', [FacilitiesController::class, 'addForm'])->middleware('auth');
Route::post('/console/facilities/add', [FacilitiesController::class, 'add'])->middleware('auth');
Route::get('/console/facilities/edit/{facility:id}', [FacilitiesController::class, 'editForm'])->where('facility', '[0-9]+')->middleware('auth');
Route::post('/console/facilities/edit/{facility:id}', [FacilitiesController::class, 'edit'])->where('facility', '[0-9]+')->middleware('auth');
Route::get('/console/facilities/delete/{facility:id}', [FacilitiesController::class, 'delete'])->where('facility', '[0-9]+')->middleware('auth');
Route::get('/console/facilities/image/{facility:id}', [FacilitiesController::class, 'imageForm'])->where('facility', '[0-9]+')->middleware('auth');
Route::post('/console/facilities/image/{facility:id}', [FacilitiesController::class, 'image'])->where('facility', '[0-9]+')->middleware('auth');

Route::get('/console/users/list', [UsersController::class, 'list'])->middleware('auth');
Route::get('/console/users/add', [UsersController::class, 'addForm'])->middleware('auth');
Route::post('/console/users/add', [UsersController::class, 'add'])->middleware('auth');
Route::get('/console/users/edit/{user:id}', [UsersController::class, 'editForm'])->where('user', '[0-9]+')->middleware('auth');
Route::post('/console/users/edit/{user:id}', [UsersController::class, 'edit'])->where('user', '[0-9]+')->middleware('auth');
Route::get('/console/users/delete/{user:id}', [UsersController::class, 'delete'])->where('user', '[0-9]+')->middleware('auth');

Route::get('/console/types/list', [TypesController::class, 'list'])->middleware('auth');
Route::get('/console/types/add', [TypesController::class, 'addForm'])->middleware('auth');
Route::post('/console/types/add', [TypesController::class, 'add'])->middleware('auth');
Route::get('/console/types/edit/{type:id}', [TypesController::class, 'editForm'])->where('type', '[0-9]+')->middleware('auth');
Route::post('/console/types/edit/{type:id}', [TypesController::class, 'edit'])->where('type', '[0-9]+')->middleware('auth');
Route::get('/console/types/delete/{type:id}', [TypesController::class, 'delete'])->where('type', '[0-9]+')->middleware('auth');

Route::get('/console/bookings/list', [BookingsController::class, 'list'])->middleware('auth');
Route::get('/console/bookings/add', [BookingsController::class, 'addForm'])->middleware('auth');
Route::post('/console/bookings/add', [BookingsController::class, 'add'])->middleware('auth');
Route::get('/console/bookings/edit/{booking:id}', [BookingsController::class, 'editForm'])->where('booking', '[0-9]+')->middleware('auth');
Route::post('/console/bookings/edit/{booking:id}', [BookingsController::class, 'edit'])->where('booking', '[0-9]+')->middleware('auth');
Route::get('/console/bookings/delete/{booking:id}', [BookingsController::class, 'delete'])->where('booking', '[0-9]+')->middleware('auth');

Route::get('/console/providers/list', [ProvidersController::class, 'list'])->middleware('auth');
Route::get('/console/providers/add', [ProvidersController::class, 'addForm'])->middleware('auth');
Route::post('/console/providers/add', [ProvidersController::class, 'add'])->middleware('auth');
Route::get('/console/providers/edit/{provider:id}', [ProvidersController::class, 'editForm'])->where('provider', '[0-9]+')->middleware('auth');
Route::post('/console/providers/edit/{provider:id}', [ProvidersController::class, 'edit'])->where('provider', '[0-9]+')->middleware('auth');
Route::get('/console/providers/delete/{provider:id}', [ProvidersController::class, 'delete'])->where('provider', '[0-9]+')->middleware('auth');

Route::get('/console/provinces/list', [ProvincesController::class, 'list'])->middleware('auth');
Route::get('/console/provinces/add', [ProvincesController::class, 'addForm'])->middleware('auth');
Route::post('/console/provinces/add', [ProvincesController::class, 'add'])->middleware('auth');
Route::get('/console/provinces/edit/{province:id}', [ProvincesController::class, 'editForm'])->where('province', '[0-9]+')->middleware('auth');
Route::post('/console/provinces/edit/{province:id}', [ProvincesController::class, 'edit'])->where('province', '[0-9]+')->middleware('auth');
Route::get('/console/provinces/delete/{province:id}', [ProvincesController::class, 'delete'])->where('province', '[0-9]+')->middleware('auth');