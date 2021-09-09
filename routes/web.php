<?php

use App\Http\Controllers\ServicoController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rotas para trabalhar com o serviço
Route::get('/servicos', [ServicoController::class, 'index'])->name('servicos.index');
Route::get('/servicos/create', [ServicoController::class, 'create'])->name('servicos.create');
Route::get('/servicos/edit/{id}', [ServicoController::class, 'edit'])->name('servicos.edit');
Route::post('/servicos/store', [ServicoController::class, 'store'])->name('servicos.store');
Route::put('/servicos/store/{id}', [ServicoController::class, 'update'])->name('servicos.update');
Route::delete('/servicos/store', [ServicoController::class, 'delete'])->name('servicos.delete');