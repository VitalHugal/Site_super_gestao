<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\LogAcesso;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $metodo_autenticação, $perfil)
    {
        echo $metodo_autenticação.'-'.$perfil.'<br>';
        if ($metodo_autenticação == 'padrao') {
            echo 'Verficar o usuário e senha no banco de dados'.$perfil.'<br>';
        }
        if ($metodo_autenticação == 'ldap') {
            echo 'Verficar o usuário e senha no AD'.$perfil.'<br>';
        }
        if ($perfil == 'visitante') {
            echo'Exibir apenas alguns reursos';
        }else{
            echo'CArregar o perfil do banco de dados';
        }

        if(false){

        }else{
            return Response('Acesso negado! Rota exige autenticação!');
        }
    }
}
