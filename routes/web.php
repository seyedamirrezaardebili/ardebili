<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('adminpanel')->group(function (){
    Route::get('/', [AdminController::class,'index'])->name('adminpanel');
   //profile route
    Route::get("profile",[ProfileController::class,'index'])->name('adminpanel.profile');
    Route::post("profile",[ProfileController::class,'index'])->name('adminpanel.profile');
    Route::put("profile",[ProfileController::class,'index']);
    Route::patch("profile",[ProfileController::class,'index']);
    // article route
    Route::post("article",[ProfileController::class,'index'])->name('adminpanel.article');
    Route::put("article",[ProfileController::class,'index']);
    Route::patch("article",[ProfileController::class,'index']);

    
});

Route::get('/',function(){
  return  view('index');
});
