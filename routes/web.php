<?php

use App\Http\Controllers\QRCodeController;
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
    return view('qrcode');
});

Route::post('/generate', [QRCodeController::class, 'generate'])->name('qrcode.generate');

Route::get('/read/{id}', [QRCodeController::class, 'read'])->name('qrcode.read');
