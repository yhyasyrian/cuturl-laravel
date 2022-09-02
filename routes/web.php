<?php

use App\Http\Controllers\ShourtLink;
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

Route::get('/',[ShourtLink::class,'index']);
Route::post('/',[ShourtLink::class,'post'])->name('ctreat.link');
Route::get('/{code}',[ShourtLink::class,'code']);