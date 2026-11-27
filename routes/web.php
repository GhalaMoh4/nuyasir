<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormController;
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
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Shared between the table (role 0) and mslak (role 1) review screens.
    Route::post('/needModification/{id}', [FormController::class, 'needModification'])->name('form.needModification');
    Route::post('/reject/{id}', [FormController::class, 'reject'])->name('form.reject');
});

Route::get('/', [FormController::class, 'home'])->name('home');
Route::get('/form', [FormController::class, 'form'])->name('form');
Route::post('/form', [FormController::class, 'store'])->name('form.store');
Route::get('/check-status/{applicationNum}', [FormController::class, 'checkStatus'])->name('form.checkStatus');
Route::get('/download-pdf', [FormController::class, 'downloadPDF'])->name('download.pdf');


Route::middleware(['auth', 'checkRole:0'])->group(function () {
    Route::get('/table', [FormController::class, 'table'])->name('table');
    // Correcting the route to accept the ID parameter
    Route::get('/form/remove/{id}', [FormController::class, 'remove'])->name('form.remove');
    Route::get('/process-stamp/{id}', [FormController::class, 'processFDocumentStamp'])->name('process.stamp');
    // Preliminary acceptance: table reviewer hands the application off to mslak
    Route::get('/accept/{id}', [FormController::class, 'accept'])->name('form.accept');
});

Route::middleware(['auth', 'checkRole:1'])->group(function () {
    Route::get('/mslak', [FormController::class, 'showMslak'])->name('mslak');
    // Final acceptance: mslak organization's sign-off
    Route::get('/accept-final/{id}', [FormController::class, 'acceptFinal'])->name('form.acceptFinal');
});




require __DIR__ . '/auth.php';
