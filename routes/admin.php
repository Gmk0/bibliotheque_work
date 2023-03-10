<?php

use App\Http\Controllers\AdminController;
use App\Http\Livewire\Admin\Administration;
use App\Http\Livewire\Admin\DomaineViews;
use App\Http\Livewire\Admin\UserAdmin;
use App\Http\Livewire\Admin\WorksAdmin;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {

    Route::get('/login', [AdminController::class, 'create'])->name('admin.login.form');

    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');

    Route::get('/logout', [AdminController::class, 'destroy'])->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
        
        Route::get('/domaines', DomaineViews::class)->name('admin.domaine');
        Route::get('/works', WorksAdmin::class)->name('admin.works');
        Route::get('/users', UserAdmin::class)->name('admin.users');
        Route::get('/administration', Administration::class)->name('admin.administration');
        Route::get('/works_view/{id}', \App\Http\Livewire\Admin\ViewOneWorks::class)->name('admin.works_view');
         Route::get('/student', \App\Http\Livewire\Admin\StudentAdmin::class)->name('admin.student');

    });
});