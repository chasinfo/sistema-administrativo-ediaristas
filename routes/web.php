<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\UsuarioController;
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

Route::get('/', [LoginController::class, 'showLoginForm']);

Auth::routes();

Route::middleware('auth')->group(function() {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Rotas para serviço
    Route::get('/servicos', [ServicoController::class, 'index'])->name('servicos.index');
    Route::get('/servicos/create', [ServicoController::class, 'create'])->name('servicos.create');
    Route::get('/servicos/{servico}/edit', [ServicoController::class, 'edit'])->name('servicos.edit');
    Route::post('/servicos/store', [ServicoController::class, 'store'])->name('servicos.store');
    Route::put('/servicos/{servico}/store', [ServicoController::class, 'update'])->name('servicos.update');
    Route::delete('/servicos/{servico}/store', [ServicoController::class, 'destroy'])->name('servicos.delete');

    // Rotas para usuário
    Route::resource('usuarios', UsuarioController::class);

});