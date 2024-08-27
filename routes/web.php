<?php


use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TodoController::class, 'index'])->name('home');
Route::get('/todos/create', [TodoController::class, 'create'])->name('todosCreate');
Route::post('/todos/store', [TodoController::class, 'store'])->name('todosStore');
Route::get('/todos/{todo}/details', [TodoController::class, 'details'])->name('todoDetails');

Route::get('/todos/{todo}/update', [TodoController::class, 'edit'])->name('todoUpdate');
Route::put('/todos/{todo}/storeupdate', [TodoController::class, 'update'])->name('todoUpdateStore');

Route::delete('/todos/{todo}/delete', [TodoController::class, 'destroy'])->name('todoDelete');