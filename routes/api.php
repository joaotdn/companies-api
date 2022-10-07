<?php

use App\Http\Controllers\CompanyController;
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

// List companies
Route::get('companies', [CompanyController::class, 'index']);

// List single company
Route::get('company/{id}', [CompanyController::class, 'show']);

// Create new company
Route::post('company', [CompanyController::class, 'store']);

// Update company
Route::put('company/{id}', [CompanyController::class, 'update']);

// Delete company
Route::delete('company/{id}', [CompanyController::class,'destroy']);