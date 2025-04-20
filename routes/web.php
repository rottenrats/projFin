<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Auth\Events\Registered;

use App\Http\Controllers\User\budgetViewController;
use App\Http\Controllers\User\transactionController;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UsersEditController;
use App\Http\Controllers\Admin\adminDashboardViewController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/budgets', [budgetViewController::class, 'index'])->name('budgets.index');
Route::post('/budgets', [budgetViewController::class, 'store'])->name('budgets.store');
Route::get('/budget/create', [budgetViewController::class, 'create'])->name('budget.create');
Route::get('/budgets/{id}', [budgetViewController::class, 'show'])->name('budgets.show');


Route::get('/transactions', [transactionController::class, 'index'])->name('transactions');
Route::get('/transactions/create', [transactionController::class, 'create'])->name('transactions.create');
Route::post('/transactions', [transactionController::class, 'store'])->name('transactions.store');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [adminDashboardViewController::class, 'index'])->name('adminDasboard');
});
Route::middleware('admin')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [UsersEditController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

require __DIR__.'/auth.php';
