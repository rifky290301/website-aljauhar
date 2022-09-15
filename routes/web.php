<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth:web'], function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\PostController::class, 'dashboard']);

    Route::prefix('artikel')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\PostController::class, 'index']);
        Route::get('/tambah', [App\Http\Controllers\Admin\PostController::class, 'create']);
        Route::post('/', [App\Http\Controllers\Admin\PostController::class, 'store']);
        Route::get('/{id}', [App\Http\Controllers\Admin\PostController::class, 'edit']);
        Route::patch('/{id}', [App\Http\Controllers\Admin\PostController::class, 'update']);
        Route::delete('/{id}', [App\Http\Controllers\Admin\PostController::class, 'destroy']);
    });

    Route::prefix('kategori')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
        Route::get('/tambah', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
        Route::post('/', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
        Route::get('/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
        Route::patch('/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
        Route::delete('/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
    });

    Route::prefix('tag')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\TagController::class, 'index']);
        Route::get('/tambah', [App\Http\Controllers\Admin\TagController::class, 'create']);
        Route::post('/', [App\Http\Controllers\Admin\TagController::class, 'store']);
        Route::get('/{id}', [App\Http\Controllers\Admin\TagController::class, 'edit']);
        Route::patch('/{id}', [App\Http\Controllers\Admin\TagController::class, 'update']);
        Route::delete('/{id}', [App\Http\Controllers\Admin\TagController::class, 'destroy']);
    });

    Route::prefix('santri')->group(function () {
        Route::get('/', [App\Http\Controllers\SantriController::class, 'index']);
        Route::get('/tambah', [App\Http\Controllers\SantriController::class, 'create']);
        Route::post('/', [App\Http\Controllers\SantriController::class, 'store']);
        Route::get('/{id}', [App\Http\Controllers\SantriController::class, 'edit']);
        Route::patch('/{id}', [App\Http\Controllers\SantriController::class, 'update']);
        Route::delete('/{id}', [App\Http\Controllers\SantriController::class, 'destroy']);
    });

    Route::prefix('jabatan')->group(function () {
        Route::get('/', [App\Http\Controllers\JabatanController::class, 'index']);
        Route::get('/tambah', [App\Http\Controllers\JabatanController::class, 'create']);
        Route::post('/', [App\Http\Controllers\JabatanController::class, 'store']);
        Route::get('/{id}', [App\Http\Controllers\JabatanController::class, 'edit']);
        Route::patch('/{id}', [App\Http\Controllers\JabatanController::class, 'update']);
        Route::delete('/{id}', [App\Http\Controllers\JabatanController::class, 'destroy']);
    });
});

Route::get('/{any}', function () {
    return abort(404);
})->where('any', '.*');
