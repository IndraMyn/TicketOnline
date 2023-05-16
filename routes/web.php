<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TicketController;
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

Route::get('/', [CheckoutController::class, 'index'])->name('index');
Route::post('/checkout', [CheckoutController::class, 'checkout']);
Route::get('/ticket-pdf/{ticketId}', [CheckoutController::class, 'ticketPdf']);

Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'createAccount']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function () {

    Route::get('/ticket', [TicketController::class, 'index'])->name('ticket');
    Route::post('/ticket', [TicketController::class, 'update']);

    Route::get('/report', [ReportController::class, 'index'])->name('report');
    Route::get('/report/pdf', [ReportController::class, 'createPDF'])->name('report-pdf');

    Route::get('/order', [CheckoutController::class, 'list'])->name('order');
    Route::get('/order/{id}', [CheckoutController::class, 'edit'])->name('edit-order');
    Route::post('/order-update/{id}', [CheckoutController::class, 'update'])->name('update-order');
    Route::post('/order-delete/{id}', [CheckoutController::class, 'destroy']);

});