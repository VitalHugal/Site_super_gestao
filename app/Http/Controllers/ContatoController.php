<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request){
        // echo'<prev>';
        // print_r($request->all());
        // echo'</prev>';
        // echo '<br>';
        // echo '<br>';
        // echo $request->input('nome');
        // echo '<br>';
        // echo $request->input('email');

        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        $contato->save();
        return view('site.contato');
    }
}
