<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\TesteController;
use Illuminate\Support\Facades\Route;

//site

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
Route::get('/login', [LoginController::class, 'login'])->name('site.login');

//app
Route::prefix('/app')->group(function () {
    Route::get('/clientes', [ClientesController::class, 'clientes'])->name('app.clientes');
    Route::get('/fornecedores', [FornecedoresController::class, 'fornecedores'])->name('app.fornecedores');
    Route::get('/produtos', [ProdutosController::class, 'produtos'])->name('app.produtos');
});

//rota de teste

Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste'])->name('teste');


//método de fallback

Route::fallback(function(){
    echo'A rota acessada não existe <a href="'.route('site.index').'">clique aqui</a> para voltar a página principal.';
});
