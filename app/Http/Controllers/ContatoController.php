<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\SiteContato;
use \App\Models\MotivoContato;


class ContatoController extends Controller
{
    public function contato(Request $request){

        $motivo_contatos = MotivoContato::all();

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

        return view('site.contato', ['titulo'=> 'Contato(teste)', 'motivo_contatos' =>  $motivo_contatos]);
    }

    public function salvar(Request $request){
        //realizar a validação dos dado no formulario recebidos pelo request
    $request->validate(['nome'=>'required|min:3|max:40|unique:site_contatos',
    'telefone' =>'required',
    'email'=>'email',
    'motivo_contatos_id'=>'required',
    'mensagem'=>'required|max:2000'
]);
    SiteContato::create($request->all());
    return redirect()->route('site.index');
    }

}
