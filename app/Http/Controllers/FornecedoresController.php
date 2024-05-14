<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedoresController extends Controller
{

    public function index(){
        return view('app.fornecedor.index');
    }
    
    public function listar(Request $request){

        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%') 
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')->get();

        return view('app.fornecedor.listar',['fornecedores' =>$fornecedores]);
    }
    public function adicionar(Request $request){

        $msg ='';

        if ($request->input ('_token') != '') {
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site'=>'required',
                'uf'=>'required|min:2|max:2',
                'email'=>'email',
            ];

            $feedback =[
                'required'=>'Esse campo é obrigatório',
                'email.email'=>'Esse e-mail é inválido.',
                'nome.min'=>'Esse campo tem que ter no mínimo 3 caracteres',
                'nome.max'=>'Esse campo tem que ter no máximo 40 caracteres',
                'uf.min'=>'Esse campo tem que ter no mínimo 2 caracteres',
                'uf-max'=>'Esse campo tem que ter no máximo 2 caracteres',
            ];

            $request -> validate ($regras, $feedback);

           $fornecedor = new Fornecedor();

           $fornecedor->create($request->all());

           //redirect

           //dados view

           $msg = 'Cadastro realizado com sucesso';
        }
        return view('app.fornecedor.adicionar', ['msg' =>$msg]);
    }
}
