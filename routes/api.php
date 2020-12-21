<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('product/pdf', [ProductController::class, 'getProduct']);
Route::get('product/pdfDownload', [ProductController::class, 'downloadPDF']);
Route::get('product/{min}/{max}', [ProductController::class, 'filterBetween']);
Route::apiResource("product", ProductController::class);
