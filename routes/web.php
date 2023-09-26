<?php

use App\Http\Controllers\TontineController;
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

route::resource('tontine',TontineController::class);

Route::get('detail', function () {
    return view('detail');
})->name('detail.tontine');
