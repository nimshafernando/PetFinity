<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

use App\Http\Controllers\Api\MissingPetController;
use App\Http\Controllers\Api\SightingController;

Route::middleware(['auth:petowner'])->group(function () {
   
    
});
