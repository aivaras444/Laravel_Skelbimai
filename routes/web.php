<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SkelbimaiController;
use App\Http\Controllers\IsimintiController;

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

Route::get('home',[HomeController::class, 'index'])->name('home.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('naujas-skelbimas/', [SkelbimaiController::class, 'create'])->name('skelbimai.create');
    Route::post('store/', [SkelbimaiController::class, 'store'])->name('skelbimai.store');
    Route::get('edit/{skelbimas}', [SkelbimaiController::class, 'edit'])->name('skelbimai.edit');
    Route::put('edit/{skelbimas}', [SkelbimaiController::class, 'update'])->name('skelbimai.update');
    Route::delete('/{skelbimas}', [SkelbimaiController::class, 'destroy'])->name('skelbimai.destroy');
    Route::get('mano-skelbimai/', [SkelbimaiController::class, 'manoSkelbimai'])->name('skelbimai.manoSkelbimai');

    Route::get('remembered-ads', [IsimintiController::class, 'index'])->name('isiminti.index');
    Route::post('add-to-remembered', [IsimintiController::class, 'add'])->name('isiminti.add');
});

require __DIR__.'/auth.php';

Route::get('/', [SkelbimaiController::class, 'index'])->name('skelbimai.index');
Route::get('skelbimai/{skelbimas}', [SkelbimaiController::class, 'show'])->name('skelbimai.show');
