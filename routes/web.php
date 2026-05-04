<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\PecaController;
use App\Http\Controllers\OrdemServicoController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\OrdemServicoPecaController;
use App\Http\Controllers\OrdemServicoServicoController;
use App\Http\Controllers\RelatorioController;

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
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


Route::middleware(['auth'])->group(function () {

    Route::resource('os', OrdemServicoController::class)
        ->parameters(['os' => 'ordemServico']);
});

Route::get('/dashboard', [OrdemServicoController::class, 'dashboard'])
    ->middleware('auth')
    ->name('adm.dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::resource('relatorios', RelatorioController::class);

    Route::post('/relatorios/gerar', [RelatorioController::class, 'gerar'])
        ->name('relatorios.gerar');

    Route::resource('colaboradores', UserController::class)
        ->parameters(['colaboradores' => 'user']);
});


Route::middleware(['auth', 'role:admin,caixa'])->group(function () {

    Route::resource('clientes', ClienteController::class);

    Route::resource('veiculos', VeiculoController::class);

    Route::resource('pecas', PecaController::class);

    Route::resource('servicos', ServicoController::class);

    Route::get('os/{ordemServico}/pdf', [OrdemServicoController::class, 'pdf'])
        ->name('os.pdf');
});


Route::middleware(['auth', 'role:admin,mecanico'])->group(function () {

    Route::resource('os.pecas', OrdemServicoPecaController::class)
        ->parameters(['os' => 'ordemServico']);

    Route::resource('os.servicos', OrdemServicoServicoController::class)
        ->parameters(['os' => 'ordemServico']);
});