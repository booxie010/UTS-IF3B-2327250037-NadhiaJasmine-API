<?php

use App\Http\Controllers\EventsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Prompts\Concerns\Events;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/event', [EventsController::class, 'index']); 
Route::get('/event', [EventsController::class, 'index']);
Route::post('/event', action: [EventsController::class, 'store']);
Route::patch('/event/(event)', action: [EventsController::class, 'update']);
Route::delete('/event/(event)', action: [EventsController::class, 'destroy']);