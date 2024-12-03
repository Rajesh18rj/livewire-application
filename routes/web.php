<?php

use App\Livewire\HelloWorld;
use Illuminate\Support\Facades\Route;
use App\Livewire\Greeting;
use App\Livewire\Counter;
use App\Livewire\ContactForm;
use App\Livewire\BasicForm;


Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', HelloWorld::class);
Route::get('inline', Greeting::class);

Route::get('/counter/{id}', Counter::class);

Route::get('basic', BasicForm::class);

Route::get('contact', ContactForm::class);
