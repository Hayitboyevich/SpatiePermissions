<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RolesController;
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
], function(){
    Route::get('/', [HomeController::class, 'index'])->name('admin');
    Route::get('/roles', [RolesController::class, 'index'])->name('roles');
    Route::get('/roles/create', [RolesController::class, 'create'])->name('roles.create');
    Route::get('/roles/edit/{id}', [RolesController::class, 'edit'])->name('roles.edit');
    Route::post('/roles/store', [RolesController::class, 'store'])->name('roles.store');
    Route::get('/permissions', [HomeController::class, 'permissions'])->name('permissions');
});


