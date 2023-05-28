<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TechnicianController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// admin
Route::get('/admin',[AdminController::class,'index']);

// Categories
Route::get('/categories',[CategoryController::class,'index']);
Route::get('/categories/{id}',[CategoryController::class,'show']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);


// Technician
Route::get('/technicians',[TechnicianController::class,'index']);
Route::get('/technicians/{id}',[TechnicianController::class,'show']);
Route::post('/technicians', [TechnicianController::class, 'store']);
Route::get('/technicians/{id}/edit',[TechnicianController::class,'edit']);
Route::put('/technicians/{id}', [TechnicianController::class, 'update']);
Route::delete('/technicians/{id}', [TechnicianController::class, 'destroy']);

// Users
Route::get('/users',[UserController::class,'index']);
Route::get('/users/{id}',[UserController::class,'show']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}/edit',[UserController::class,'edit']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);


