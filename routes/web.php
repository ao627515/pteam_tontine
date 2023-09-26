<?php

use App\Http\Controllers\ClassementController;
use App\Http\Controllers\CotisationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ParticipationController;
use App\Http\Controllers\TontineController;
use App\Http\Controllers\UserController;
use App\Models\Tontine;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

route::resource([
    'user'=>UserController::class,
    'cotisation'=>CotisationController::class,
    'dashboard'=>DashboardController::class,
    'participation'=>ParticipationController::class,
    'tontine'=>TontineController::class,
    'classement'=>ClassementController::class,
]);

Route::get('detail', function () {
    return view('detail');
})->name('detail.tontine');
