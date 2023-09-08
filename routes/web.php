<?php

use App\Http\Controllers\AuditController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware('admin')->group(function(){

        Route::resource('/users', UserController::class);

        Route::resource('/roles', RoleController::class);
        Route::post('roles/{role}/permissions', [RoleController::class, 'assignPermissions'])->name('roles.permissions');

        Route::get('/audits' , [AuditController::class, 'index'])->name('audits.index');
        Route::post('/audits' , [AuditController::class, 'search'])->name('audits.search');
        Route::get('/audits/{id}/show' , [AuditController::class, 'show'])->name('audits.show');

    });

    Route::resource('/posts', PostController::class);
    Route::post('/posts/search', [PostController::class, 'search'])->name('posts.search');

});



require __DIR__.'/auth.php';
