<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        //return $next($request);

        $ip = $request->server->get('REMOTE_ADDR');

        //Nesse trecho pegamos o requestUri no dd e colocamos ele nessa formatação pois é necessario;
        $rota = $request->getRequestUri();
        LogAcesso::create(['log' => "IP '$ip' requisitou a rota '$rota'"]);
        //return $next($request);
        return Response('Chegamos no middleware e finalizmaos no proprio middleware');
    }
}
