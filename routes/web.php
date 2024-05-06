<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\TesteController;
use App\Http\Middleware\LogAcessoMiddleware;
use App\Http\Middleware\AutenticacaoMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// //site
// Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
// Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
// Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');
// Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
// Route::get('/login', function(){ return 'login';})->name('site.login');


//apelidando o middleware
Route::aliasMiddleware('log.acesso', \App\Http\Middleware\LogAcessoMiddleware::class);
 
//apelidando o middleware
Route::aliasMiddleware('autenticacao', \App\Http\Middleware\AutenticacaoMiddleware::class);

//agrupando rotas com o middleware pelo apelido
Route::middleware(['log.acesso'])->group(function () {
    Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
    Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
    Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');

});

//app
Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::get('/sair',  [LoginController::class,'sair'])->name('app.sair');
    Route::get('/cliente',[ClienteController::class, 'index'])->name('app.cliente');
    Route::get('/fornecedore', [FornecedoresController::class, 'index'])->name('app.fornecedor');
    Route::get('/produto', [ProdutoController::class, 'index'])->name('app.produto');

});

//login
Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

//rota de teste
Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste'])->name('teste');

//método de fallback
Route::fallback(function(){
    echo'A rota acessada não existe <a href="'.route('site.index').'">clique aqui</a> para voltar a página principal.';
});
