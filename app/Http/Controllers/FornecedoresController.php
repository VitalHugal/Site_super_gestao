<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedoresController extends Controller
{

    public function index(){
        return view('app.fornecedor.index');
    }
    
    public function listar(){
        return view('app.fornecedor.listar');
    }
    public function adicionar(Request $request){
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
        }
        return view('app.fornecedor.adicionar');
    }
}
