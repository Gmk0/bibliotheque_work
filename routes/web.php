<?php

use App\Http\Controllers\UserController;
use App\Http\Livewire\User\AddWork;
use App\Http\Livewire\User\ViewWorks;
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

Route::get('/', [UserController::class,'home'])->name('home');

Route::get('/admin', function () {
    return view('admin.home');
});


Route::get('/consultaion', function () {
    return view('consultation');
})->name('consultation');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/publication',AddWork::class)->name('publication');
    Route::get('/works_view/{id}', ViewWorks::class)->name('works_view');

});

require 'admin.php';
