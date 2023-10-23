<?php

use App\Http\Controllers\TarefaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::resource('tarefas', 'App\Http\Controllers\TarefaController')->middleware('auth');
Route::resource('tarefas', TarefaController::class)->middleware('auth');
