<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('branches.index'); // Default redirect
});

Route::resource('branches', BranchController::class);
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);