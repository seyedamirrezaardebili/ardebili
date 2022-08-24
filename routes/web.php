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
Route::prefix('adminpanel')->middleware('auth:sanctum')->group(function (){
    Route::get('/', [AdminController::class,'index'])->name('adminpanel');
   //profile route
    Route::get("profile",[ProfileController::class,'index'])->name('adminpanel.profile');
    Route::get("editprofile",[ProfileController::class,'show'])->name('adminpanel.editprofile');
   Route::post("editprofile",[ProfileController::class,'store'])->name('adminpanel.editprofile');
    Route::put("editprofile",[ProfileController::class,'edit']);
    Route::patch("editprofile",[ProfileController::class,'edit']);
    // article route
    Route::post("article",[ProfileController::class,'index'])->name('adminpanel.article');
    Route::put("article",[ProfileController::class,'index']);
    Route::patch("article",[ProfileController::class,'index']);


});

Route::get('/',function(){
  return  view('index');
});


