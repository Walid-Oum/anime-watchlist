<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FaqCategoryController as AdminFaqCategoryController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\NewsItemController as AdminNewsItemController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Userzone\ProfileController;
use App\Http\Controllers\WatchlistController;
use Illuminate\Support\Facades\Route;


/* Publieke routes */

Route::get('/', [AnimeController::class, 'index'])
    ->name('home');

Route::get('/animes', [AnimeController::class, 'index'])
    ->name('animes.index');

Route::get('/animes/{anime}', [AnimeController::class, 'show'])
    ->name('animes.show');

Route::get('/profile/{user}', [ProfileController::class, 'show'])
    ->name('profile.show');

Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');

Route::get('/news/{newsItem}', [NewsController::class, 'show'])
    ->name('news.show');

Route::get('/faq', [FaqController::class, 'index'])
    ->name('faq.index');

Route::get('/contact', [ContactController::class, 'create'])
    ->name('contact.create');

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');


/* Ingelogde gebruikers */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::get('/watchlist', [WatchlistController::class, 'index'])
        ->name('watchlist.index');

    Route::post('/watchlist/{anime}', [WatchlistController::class, 'store'])
        ->name('watchlist.store');

    Route::patch('/watchlist/{anime}', [WatchlistController::class, 'update'])
        ->name('watchlist.update');

    Route::delete('/watchlist/{anime}', [WatchlistController::class, 'destroy'])
        ->name('watchlist.destroy');
});



 /* Admin routes */


Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [AdminController::class, 'index'])
            ->name('dashboard');

        Route::resource('users', AdminUserController::class)
            ->except(['show', 'destroy']);

        Route::resource('news', AdminNewsItemController::class)
            ->except(['show']);

        Route::resource('faq-categories', AdminFaqCategoryController::class)
            ->except(['show']);

        Route::resource('faqs', AdminFaqController::class)
            ->except(['show']);
    });




require __DIR__.'/auth.php';
