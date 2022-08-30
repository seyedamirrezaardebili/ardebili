<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MassageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GroupController;
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

Route::get('/', [AuthUserController::class,'index'])->name('login');
Route::post('/', [AuthUserController::class,'store'])->name('login');

Route::prefix('adminpanel')->group(function (){
    Route::get('/', [AdminController::class,'index'])->name('adminpanel');
   //profile route
    Route::get("profile",[ProfileController::class,'index'])->name('adminpanel.profile');
    Route::get("editprofile",[ProfileController::class,'create'])->name('adminpanel.editprofile');
    Route::post("editprofile",[ProfileController::class,'store'])->name('adminpanel.editprofile');

    Route::get("prouduct",[ProductController::class,'index'])->name('adminpanel.product');
    Route::get("prouduct/input",[ProductController::class,'create'])->name('adminpanel.product.input');
    Route::post("prouduct/input",[ProductController::class,'store'])->name('adminpanel.product.input');
    Route::get("prouduct/edit/id/{id}",[ProductController::class,'edit'])->name('adminpanel.product.edit');
    Route::get("prouduct/delete/id/{id}",[ProductController::class,'show'])->name('adminpanel.product.delete');
    Route::delete("prouduct/delete/id/{id}",[ProductController::class,'delete'])->name('adminpanel.product.delete');

    Route::put("prouduct/input",[ProductController::class,'update'])->name('adminpanel.product.input');
    Route::delete("prouduct/input",[ProductController::class,'destroy'])->name('adminpanel.product.input');

    Route::get("group",[GroupController::class,'index'])->name('adminpanel.group');
    Route::get("group/input",[GroupController::class,'create'])->name('adminpanel.group.input');
    Route::post("group/input",[GroupController::class,'store'])->name('adminpanel.group.input');
    Route::put("group/input",[GroupController::class,'edit'])->name('adminpanel.group.input');
    Route::delete("group/input",[GroupController::class,'destroy'])->name('adminpanel.group.input');

    Route::get("file",[FileManagerController::class,'index'])->name('adminpanel.file');
    Route::get("file/input",[FileManagerController::class,'create'])->name('adminpanel.file.input');
    Route::post("file/input",[FileManagerController::class,'store'])->name('adminpanel.file.input');
    Route::put("file/input",[FileManagerController::class,'edit'])->name('adminpanel.file.input');
    Route::delete("file/input",[FileManagerController::class,'destroy'])->name('adminpanel.file.input');

    Route::get("article",[ArticleController::class,'index'])->name('adminpanel.article');
    Route::get("article/input",[ArticleController::class,'create'])->name('adminpanel.article.input');
    Route::post("article/input",[ArticleController::class,'store'])->name('adminpanel.article.input');
    Route::put("article/input",[ArticleController::class,'edit'])->name('adminpanel.article.input');
    Route::delete("article/input",[ArticleController::class,'destroy'])->name('adminpanel.article.input');

    Route::get("massege",[MassageController::class,'index'])->name('adminpanel.massege');

});

Route::get('/',[IndexController::class,'index']);


