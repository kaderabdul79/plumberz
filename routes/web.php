<?php

use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return User::all();
    $data = User::create([
        'name' => 'rahim5',
        'email' => 'rahim5@gmail.com',
        'password' => 'password',
    ]);
    return $data;
    // return Admin::all();
    return view('welcome');
});
