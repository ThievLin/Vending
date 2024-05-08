<?php

use App\Http\Controllers\CommuneController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\MachinesController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\VillageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'api'], function () {
    // Province
    Route::get('/provinces/{type?}', [ProvinceController::class, 'index']);
    // District
    Route::get('/districts/{id}/{type?}', [DistrictController::class, 'index']);
    // Commune
    Route::get('/communes/{id}/{type?}', [CommuneController::class, 'index']);
    // Village
    Route::get('/villages/{id}/{type?}', [VillageController::class, 'index']);
    // Patient
    Route::get('/patient/{type?}', [PatientController::class, 'index']);
    Route::get('/update', [PatientController::class, 'update']);

    Route::post('/patient/store', [PatientController::class, 'store']);
    Route::get('/filter-data', [PatientController::class, 'filterData']);
    Route::get('/filter-data-dashboard', [PatientController::class, 'filterDataDashboard']);

    Route::get('/machine-created', [PatientController::class, 'machineCreated']);
    Route::get('/pro-price', [PatientController::class, 'proPrice']);

    // Route::post('/machines/store', [MachinesController::class, 'store']);
    // Route::get('/test', [HomeController::class, 'patient']);
});