<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [HomeController::class,'index']);




//後台
Route::middleware(['auth'])->group(function () {
    //category
    Route::prefix('category')->group(function () {
        Route::get('/all', [CategoryController::class,'index'])->name('all.category');
        Route::post('/', [CategoryController::class,'store'])->name('add.category');
        Route::get('/{category}', [CategoryController::class,'edit'])->name('edit.category');
        Route::put('/{category}', [CategoryController::class,'update'])->name('update.category');
        Route::get('/delete/{category}', [CategoryController::class,'delete'])->name('delete.category');
        Route::get('/restore/{id}', [CategoryController::class,'restore'])->name('restore.category');
        Route::get('/pdelete/{id}', [CategoryController::class,'Pdelete'])->name('pdelete.category');
    });


    //Brand Image
    Route::prefix('brand')->group(function () {
        Route::get('/all', [BrandController::class,'index'])->name('all.brand');
        Route::post('/', [BrandController::class,'store'])->name('add.brand');
        Route::get('/{brand}', [BrandController::class,'edit'])->name('edit.brand');
        Route::put('/{brand}', [BrandController::class,'update'])->name('update.brand');
        Route::get('/delete/{id}', [BrandController::class,'delete'])->name('delete.brand');
    });

    //Multic Image
    Route::prefix('multipic')->group(function () {
        Route::get('/image', [BrandController::class,'multipic'])->name('all.multipic');
        Route::post('/', [BrandController::class,'multipicStore'])->name('add.multipic');
        Route::get('/{multipic}', [BrandController::class,'multipicEdit'])->name('edit.multipic');
        Route::put('/{multipic}', [BrandController::class,'multipicUpdate'])->name('update.multipic');
        Route::get('/delete/{id}', [BrandController::class,'multipicDelete'])->name('delete.multipic');
    });

     //Slider
     Route::prefix('slider')->group(function () {
        Route::get('/all', [SliderController::class,'index'])->name('all.slider');
        Route::post('/', [SliderController::class,'store'])->name('add.slider');
        Route::get('/{slider}', [SliderController::class,'edit'])->name('edit.slider');
        Route::put('/{slider}', [SliderController::class,'update'])->name('update.slider');
        Route::get('/delete/{id}', [SliderController::class,'delete'])->name('delete.slider');
    });

});


//後台帳號建置相關
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

//登出
Route::prefix('admin')->group(function () {
    Route::get('/logout', [AdminController::class,'logout'])->name('admin.logout');
});
