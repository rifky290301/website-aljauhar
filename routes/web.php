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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/blog', [App\Http\Controllers\HomeController::class, 'blog']);
Route::get('/blog/{slug}', [App\Http\Controllers\HomeController::class, 'show']);
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search']);

Auth::routes([
    'register' => false,
]);

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
        Route::group(['middleware' => ['role:admin|pengurus']], function () {
            Route::get('/tambah', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
            Route::post('/', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
            Route::get('/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
            Route::patch('/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
            Route::delete('/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
        });
    });

    Route::prefix('tag')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\TagController::class, 'index']);
        Route::group(['middleware' => ['role:admin|pengurus']], function () {
            Route::get('/tambah', [App\Http\Controllers\Admin\TagController::class, 'create']);
            Route::post('/', [App\Http\Controllers\Admin\TagController::class, 'store']);
            Route::get('/{id}', [App\Http\Controllers\Admin\TagController::class, 'edit']);
            Route::patch('/{id}', [App\Http\Controllers\Admin\TagController::class, 'update']);
            Route::delete('/{id}', [App\Http\Controllers\Admin\TagController::class, 'destroy']);
        });
    });

    Route::prefix('santri')->group(function () {
        Route::get('/', [App\Http\Controllers\SantriController::class, 'index']);
        Route::get('/lihat/{id}', [App\Http\Controllers\SantriController::class, 'show']);
        Route::group(['middleware' => ['role:admin|pengurus']], function () {
            Route::get('/tambah', [App\Http\Controllers\SantriController::class, 'create']);
            Route::post('/', [App\Http\Controllers\SantriController::class, 'store']);
            Route::get('/{id}', [App\Http\Controllers\SantriController::class, 'edit']);
            Route::patch('/{id}', [App\Http\Controllers\SantriController::class, 'update']);
            Route::delete('/{id}', [App\Http\Controllers\SantriController::class, 'destroy']);
        });
    });

    Route::prefix('jabatan')->group(function () {
        Route::group(['middleware' => ['role:admin|pengurus']], function () {
            Route::get('/', [App\Http\Controllers\JabatanController::class, 'index']);
            Route::get('/tambah', [App\Http\Controllers\JabatanController::class, 'create']);
            Route::post('/', [App\Http\Controllers\JabatanController::class, 'store']);
            Route::get('/{id}', [App\Http\Controllers\JabatanController::class, 'edit']);
            Route::patch('/{id}', [App\Http\Controllers\JabatanController::class, 'update']);
            Route::delete('/{id}', [App\Http\Controllers\JabatanController::class, 'destroy']);
        });
    });

    Route::prefix('biografi')->group(function () {
        Route::group(['middleware' => ['role:admin|pengurus']], function () {
            Route::get('/', [App\Http\Controllers\BiographyController::class, 'index']);
            Route::get('/tambah', [App\Http\Controllers\BiographyController::class, 'create']);
            Route::post('/', [App\Http\Controllers\BiographyController::class, 'store']);
            Route::get('/{id}', [App\Http\Controllers\BiographyController::class, 'edit']);
            Route::patch('/{id}', [App\Http\Controllers\BiographyController::class, 'update']);
            Route::delete('/{id}', [App\Http\Controllers\BiographyController::class, 'destroy']);
        });
    });

    Route::prefix('testimoni')->group(function () {
        Route::group(['middleware' => ['role:admin|pengurus']], function () {
            Route::get('/', [App\Http\Controllers\TestimonialController::class, 'index']);
            Route::get('/tambah', [App\Http\Controllers\TestimonialController::class, 'create']);
            Route::post('/', [App\Http\Controllers\TestimonialController::class, 'store']);
            Route::get('/{id}', [App\Http\Controllers\TestimonialController::class, 'edit']);
            Route::patch('/{id}', [App\Http\Controllers\TestimonialController::class, 'update']);
            Route::delete('/{id}', [App\Http\Controllers\TestimonialController::class, 'destroy']);
        });
    });

    Route::prefix('user')->group(function () {
        Route::group(['middleware' => ['role:admin|pengurus']], function () {
            Route::get('/', [App\Http\Controllers\UserController::class, 'index']);
            Route::get('/tambah', [App\Http\Controllers\UserController::class, 'create']);
            Route::post('/', [App\Http\Controllers\UserController::class, 'store']);
            // Route::get('/{id}', [App\Http\Controllers\UserController::class, 'edit']);
            // Route::patch('/{id}', [App\Http\Controllers\UserController::class, 'update']);
            Route::delete('/{id}', [App\Http\Controllers\UserController::class, 'destroy']);
        });
    });

    Route::prefix('role')->group(function () {
        Route::group(['middleware' => ['role:admin']], function () {
            Route::get('/', [App\Http\Controllers\RoleController::class, 'index']);
        });
    });
});

Route::get('/{any}', function () {
    return abort(404);
})->where('any', '.*');
