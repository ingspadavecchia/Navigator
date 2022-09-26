<?php

use App\Http\Controllers\ClientListController;
use App\Http\Controllers\InvoiceListController;
use App\Http\Controllers\InvoiceDetailListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/clients', ClientListController::class);
Route::get('/invoices', InvoiceListController::class);
Route::get('/invoices/{invoice}/invoice_details', InvoiceDetailListController::class);
