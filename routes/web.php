<?php


use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TodoController::class, 'index'])->name('home');
Route::get('/todos/create', [TodoController::class, 'create'])->name('todosCreate');
Route::post('/todos/store', [TodoController::class, 'store'])->name('todosStore');