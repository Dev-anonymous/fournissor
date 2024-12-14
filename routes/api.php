<?php

use App\Http\Controllers\API\CategoryAPIController;
use App\Http\Controllers\API\DashAPIController;
use App\Http\Controllers\API\DevisAPIController;
use App\Http\Controllers\API\ServiceAPIController;
use App\Http\Controllers\API\ServicerequestAPIController;
use App\Http\Controllers\API\UserAPIController;
use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('users', UserAPIController::class)->only(['index', 'store', 'destroy']);
    Route::post('users/{user}', [UserAPIController::class, 'update']);
    Route::resource('category', CategoryAPIController::class);
    Route::resource('service', ServiceAPIController::class)->only(['index', 'store', 'destroy']);
    Route::post('service/{service}', [ServiceAPIController::class, 'update']);

    Route::resource('dash', DashAPIController::class)->only(['index']);
    Route::post('appconfig', [AppController::class, 'appconfig'])->name('appconfig');

    Route::resource('devis', DevisAPIController::class);
    Route::resource('servicerequest', ServicerequestAPIController::class);

    Route::post('demande-service', [AppController::class, 'demandeservice'])->name('demandeservice');
});


Route::post('contact', [AppController::class, 'contact'])->name('contact');
Route::post('search', [AppController::class, 'search'])->name('search');
