<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepositMoney;
use App\models\User;
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

//sql injection prevention
Route::get('/login', function() {
    $name = "'admin' OR 1=1";
    return DB::select(
    DB::raw("SELECT * FROM users WHERE name = ?", [$name]));
    });


Route::post('/sendmoney', [App\Http\Controllers\DepositMoney::class, 'send']); 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



