<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboardcontroller;
use  App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

use  App\Http\Controllers\Front\HomeCOntrolle;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/' , [HomeCOntrolle::class, 'Home'])->name('home');
Route::get('/page-one/{slug}' , [HomeCOntrolle::class, 'pageOne'])->name('pageOne');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
   Route::get('/dashboard',[Dashboardcontroller::class,'index'])->name('index');


   Route::resource('categories',CategoryController::class);
   Route::resource('products',ProductController::class);
});
