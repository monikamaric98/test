<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\SalonController;
use App\Http\Controllers\TerminController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('korisnici', [UserController::class, 'index']);

Route::post('/users/add', [UserController::class, 'addUser'])->name('users.add');

Route::get('/userdelete{user}', [UserController::class, 'userdelete']);
Route::get('/users/delete/{id}', [UserController::class, 'deleteuser'])->name('user.delete');


Route::get('/user{user}edit', [UserController::class, 'editrole'])->name('user.editrole');
Route::put('/user/update/{user}', [UserController::class, 'changerole']);

Route::get('/saloni', [SalonController::class, 'index']);
Route::post('/addsalon', [SalonController::class, 'add'])->name('salons.add');
Route::get('/saloni{salon}', [SalonController::class, 'show']);
Route::get('/salon{salon}edit', [SalonController::class, 'edit'])->name('salons.edit');
Route::put('/saloni/update/{salon}', [SalonController::class, 'update']);
Route::get('/saloni/delete/{id}', [SalonController::class, 'delete'])->name('salons.delete');

Route::get('/termini', [TerminController::class, 'index']);
Route::post('/addtermin', [TerminController::class, 'create'])->name('termins.add');

