<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\SiteContato;


class ContatoController extends Controller
{
    public function contato(Request $request){

        // //1º metodo para armazenamento
        // $contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');
        // $contato->save();



        // //2º metodo para armazenamento
        // $contato = new SiteContato();
        // $contato->fill($request->all());
        // $contato->save();



        // //3º metodo para armazenamento
        // $contato = new SiteContato();
        // $contato->create($request->all());

        return view('site.contato');
    }

    public function salvar(Request $request){
        //realizar a validação dos dado no formulario recebidos pelo request
    $request->validate(['nome'=>'required|min:3|max:40', 'telefone' =>'required', 'email'=>'required', 'motivo_contato'=>'required', 'mensagem'=>'required|max:2000']);
        //SiteContato::create($request->all());
    }

}
