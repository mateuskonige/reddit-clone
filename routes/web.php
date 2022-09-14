<?php

use App\Http\Controllers\Backend\CommunityController;
use App\Http\Controllers\Frontend\SubredditController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('r/{slug}', [SubredditController::class, 'show'])->name('subreddits.show');

    Route::resource('dashboard/communities', CommunityController::class);
});

require __DIR__ . '/auth.php';
