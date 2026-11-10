<?php

use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\BandCOntroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('hello/{name}', function ($name) {
    return 'Hello '. $name;
});

Route::get('bands/', [BandController::class, 'getAll']);

Route::get('bands/{id}', [BandController::class, 'getById']);

Route::post('bands/store', [BandController::class, 'store']);

Route::get('bands/gender/{gender}', [BandController::class, 'getByGender']);

Route::post('hello-post/{name}', [HelloWorldController::class, 'hello']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
