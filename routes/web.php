<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('todos.index');
});

Route::resource('todos', TodoController::class);
Route::patch('/todos/{todo}/toggle', [TodoController::class, 'toggleComplete'])->name('todos.toggle');
