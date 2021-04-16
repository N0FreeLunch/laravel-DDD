<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SomethingController;
use App\Http\Controllers\UploadController;

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

Route::get('/test/uri/something', function () {
  return 'You are at the path : /uri/something';
});

Route::get('/uri/something', [SomethingController::class, 'something']);

Route::get('/upload', [UploadController::class, 'upload']) -> name('upload');
Route::post('/upload', [UploadController::class, 'store']) -> name('upload');

Route::post('/process', [UploadController::class, 'process']) -> name('process');

Route::get('/list', [UploadController::class, 'list']) -> name('list');
