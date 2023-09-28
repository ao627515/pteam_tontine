<?php

use App\Http\Controllers\ClassementController;
use App\Http\Controllers\CotisationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ParticipationController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\TontineController;
use App\Http\Controllers\UserController;
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

Route::middleware(['guest'])->group(function(){

    Route::get('/', function () {
        return to_route('login');
    });

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});


Route::middleware(['auth'])->group(function(){

    route::resources([
        'user'=>UserController::class,
        'cotisation'=>CotisationController::class,
        'dashboard'=>DashboardController::class,
        'participation'=>ParticipationController::class,
        'tontine'=>TontineController::class,
        'classement'=>ClassementController::class,
    ]);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Ajouté un participant a une tontine
    Route::post('tontine/{tontine}/add/participant', [TontineController::class, 'addParticipant'])->name('tontine.addParticipant');

    // Commencé une tontine
    Route::post('tontine/{tontine}/start',[TontineController::class, 'start'])->name('tontine.start');

    // Show detaille participant
    Route::get('user/{user}/particpant', [UserController::class, 'showParticipant'])->name('user.showParticipant');
});
