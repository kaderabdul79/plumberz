<?php

use App\Models\User;
use App\Models\Admin;
use App\Models\Technician;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/{any}', function () {
    return view('welcome');
})->where('any','.*');
