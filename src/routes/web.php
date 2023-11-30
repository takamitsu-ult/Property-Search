<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TopController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});
//管理画面
Route::get('/admin/top', [TopController::class, 'index'])->name('admin.top');
Route::post('/properties', [PropertyController::class, 'store']);
Route::get('/properties/create', [PropertyController::class, 'create'])->name('admin.create');
Route::get('/properties/index', [PropertyController::class, 'index'])->name('admin.index');
Route::get('/properties/{id}', [PropertyController::class, 'show'])->name('admin.detail');


//ユーザー
Route::get('/user', [UserController::class, 'top'])->name('user.top');

Route::get('/user/register', [UserController::class, 'showRegistrationForm'])->name('user.register');
Route::post('/user/register', [UserController::class, 'register'])->name('user.process');
Route::post('/user/register/confirm', [UserController::class, 'showConfirmation'])->name('user.confirmation');
Route::post('/user/logout', [UserController::class, 'logout'])->name('user.logout');
Route::post('/user/login', [UserController::class, 'login'])->name('user.login');
Route::get('/user/search', [PropertyController::class, 'search'])->name('user.search');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
