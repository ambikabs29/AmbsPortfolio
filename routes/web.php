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

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InboxController;
use App\Http\Controllers\Admin\MessageController;

Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::post('/contact', [PortfolioController::class, 'submitContact'])->name('contact.submit');

// Admin Routes

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('inbox', [InboxController::class, 'index'])->name('inbox');
    Route::get('messages/{id}', [MessageController::class, 'show'])->name('messages.show');
    Route::delete('messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');
   
    Route::resource('portfolio', \App\Http\Controllers\Admin\PortfolioContentController::class);

    // About Section
    Route::resource('about', \App\Http\Controllers\Admin\AboutController::class);
   
    // Use a resource controller for projects
    Route::resource('projects', \App\Http\Controllers\Admin\ProjectController::class);

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});