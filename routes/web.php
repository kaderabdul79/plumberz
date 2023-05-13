<?php

use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return User::all();
    $data = Admin::create([
        'name' => 'rahim3',
        'email' => 'rahim4@gmail.com',
        'password' => 'password',
    ]);
    return $data;
    // return Admin::all();
    return view('welcome');
});
