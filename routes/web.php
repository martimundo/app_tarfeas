<?php

use App\Http\Controllers\TarefaController;
use App\Mail\MensagemMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]);
Route::get('/user_profile', function(){
    return view('auth.user_profile');
})->name('user_profile');

Route::get('tarefa/exportar/{extensao}',[App\Http\Controllers\TarefaController::class, 'exportacao'])->name('tarefa.exportar');
Route::resource('tarefa', TarefaController::class)->middleware('verified');


// Route::get('/mensage-teste', function(){
//     return new MensagemMail();
//     //Mail::to('martimundo@bol.com.br')->send(new MensagemMail());
//     //return 'Email enviado com sucesso';

// });
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
//         ->name('home')
//         ->middleware('verified');

//Route::resource('tarefas', 'App\Http\Controllers\TarefaController')->middleware('auth');