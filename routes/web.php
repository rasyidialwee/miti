<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');
    // Route::get('/todos/create', [TodoController::class, 'create'])->name('todos.create');
    // Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');
    // Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');

    // Route::get('/todos/{todo}/edit', [TodoController::class, 'edit'])->name('todos.edit');
    // Route::put('/todos/{todo}', [TodoController::class, 'update'])->name('todos.update');

    // Route::resource('todos', TodoController::class);

    Route::resources([
        'todos' => TodoController::class,
    ]);

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
