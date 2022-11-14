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

Route::group(['middleware' => 'auth'], function () {
    Route::group([
        'prefix' => 'admin',
        // 'middleware' => 'is_admin',
        'as' => 'admin.'
    ], function () {
        Route::resource('votes', \App\Http\Controllers\Admin\VoteController::class);

        // Route::get('/tasks', [\App\Http\Controllers\Admin\TaskController::class, 'index'])->name('tasks.index');
        // Route::post('/tasks', [\App\Http\Controllers\Admin\TaskController::class, 'store'])->name('tasks.store');
        // Route::get('/tasks/create', [\App\Http\Controllers\Admin\TaskController::class, 'create'])->name('tasks.create');
        // Route::get('/tasks/edit', [\App\Http\Controllers\Admin\TaskController::class, 'edit'])->name('tasks.edit');
        // Route::put('/tasks/{task}', [\App\Http\Controllers\Admin\TaskController::class, 'update'])->name('tasks.update');
        // Route::delete('/tasks/{task}', [\App\Http\Controllers\Admin\TaskController::class, 'destroy'])->name('tasks.destroy');
    });

    Route::group([
        'prefix' => 'user',
        'as' => 'user.'
    ], function () {
        // Route::resource('votes', \App\Http\Controllers\User\VoteController::class);
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';
