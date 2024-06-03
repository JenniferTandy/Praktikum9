<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PermissionController;
/*
|-------------------------------------------------------------------------
-
| Web Routes
|-------------------------------------------------------------------------
-
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


Route::middleware('auth')->group(function () {
    Route::get('/home', [
        App\Http\Controllers\HomeController::class, 'index'
    ])->name('home');
    Route::resources([
        'roles' => RoleController::class,
        'users' => UserController::class,
        'mahasiswas' => MahasiswaController::class,
        'permissions' => PermissionController::class,
    ]);
});
