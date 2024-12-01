<?php

use App\Livewire\HelloWorld;
use Illuminate\Support\Facades\Route;
use App\Livewire\Greeting;

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', HelloWorld::class);
Route::get('inline', Greeting::class);
