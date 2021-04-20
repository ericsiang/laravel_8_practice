<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('category')->group(function () {
    Route::get('/all', [CategoryController::class,'index'])->name('all.category');
    Route::post('/', [CategoryController::class,'store'])->name('add.category');
    Route::get('/{category}', [CategoryController::class,'edit'])->name('edit.category');
    Route::put('/{category}', [CategoryController::class,'update'])->name('update.category');
    Route::get('/delete/{category}', [CategoryController::class,'delete'])->name('delete.category');
    Route::get('/restore/{id}', [CategoryController::class,'restore'])->name('restore.category');
    Route::get('/pdelete/{id}', [CategoryController::class,'Pdelete'])->name('pdelete.category');
});


Route::prefix('brand')->group(function () {
    Route::get('/all', [BrandController::class,'index'])->name('all.brand');
    Route::post('/', [BrandController::class,'store'])->name('add.brand');
    Route::get('/{brand}', [BrandController::class,'edit'])->name('edit.brand');
    Route::put('/{brand}', [BrandController::class,'update'])->name('update.brand');
    Route::get('/delete/{id}', [BrandController::class,'delete'])->name('delete.brand');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //$users=User::all();
    $users=DB::table('users')->get();
    return view('dashboard',compact('users'));
})->name('dashboard');
