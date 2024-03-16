<?php

use App\Http\Controllers\FibonacciController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('fib');
});

Route::get('fib', [FibonacciController::class, 'researchFibonacci']);
