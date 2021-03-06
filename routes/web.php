<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//1. Halaman Home (routes biasa)
Route::get('/', [HomeController::class, 'index'])->name('home');

//2. Halaman produk (routes prefix)
Route::prefix('/product')->group(function(){
    Route::get('/product', [ProductController::class, 'index'])->name('product');
});

//3. Halaman News (routes parameter)
Route::get('/news/{title}', [NewsController::class, 'index'])->name('news');

//4. Halaman About-us (routes biasa)
Route::get('/about-us', [AboutController::class, 'index'])->name('about');

//5. Halaman contact-us (routes resource only)
Route::resource('/contact-us', ContactController::class,['only' => ['index'] ]);