<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AnimeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\WatchlistController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsItemController as AdminNewsItemController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('userzone.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profile/{user}', [App\Http\Controllers\Userzone\ProfileController::class, 'show'])
    ->name('profile.show');


Route::get('/animes', [AnimeController::class, 'index'])
    ->name('animes.index');

Route::get('/animes/{anime}', [AnimeController::class, 'show'])
    ->name('animes.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/watchlist', [WatchlistController::class, 'index'])
        ->name('watchlist.index');

    Route::post('/watchlist/{anime}', [WatchlistController::class, 'store'])
        ->name('watchlist.store');

    Route::delete('/watchlist/{anime}', [WatchlistController::class, 'destroy'])
        ->name('watchlist.destroy');

    Route::patch('/watchlist/{anime}', [WatchlistController::class, 'update'])
        ->name('watchlist.update');
});

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::resource('users', AdminUserController::class)
            ->except(['show', 'destroy']);
        Route::resource('news', AdminNewsItemController::class)
            ->except(['show']);
    });


Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');

Route::get('/news/{newsItem}', [NewsController::class, 'show'])
    ->name('news.show');

require __DIR__.'/auth.php';
