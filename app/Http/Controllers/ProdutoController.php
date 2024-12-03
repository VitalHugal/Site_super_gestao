<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Item;
use App\Http\Controllers\Controller;
use App\Models\ProdutoDetalhe;
use App\Models\Unidades;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $produtos = Item::with('itemDetalhe')->paginate(10);

        // foreach ($produtos as $key => $produto) {
        //     // print_r($produto->getAttributes());
        //     // echo "<br><br>";

        //     $produtoDetalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();

        //     if (isset($produtoDetalhe)) {
        //         // print_r($produtoDetalhe->getAttributes());

        //         $produtos[$key]['comprimento'] = $produtoDetalhe->comprimento;
        //         $produtos[$key]['largura'] = $produtoDetalhe->largura;
        //         $produtos[$key]['altura'] = $produtoDetalhe->altura;
        //     }
        //     // echo "<hr>";
        // }

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unidades = Unidades::all();
        return view('app.produto.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|max:40|min:3',
            'descricao' => 'required|max:2000|min:3',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
        ];

        $feedback = [
            'required' => 'o campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'descricao.min' => 'O campo descrição deve ter no mínimo 3 caracteres',
            'descricao.max' => 'O campo descrição deve ter no máximo 2000 caracteres',
            'peso.integer' => 'O campo peso deve ser preenchido com numeros inteiros.',
            'unidade_id.exists' => 'Não foi possível encontrar a unidade informada.',
        ];

        $request->validate($regras, $feedback);

        Produto::create($request->all());

        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        // dd($produto);

        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        $unidade = Unidades::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidade]);
        // return view('app.produto.create', ['produto' => $produto, 'unidades' => $unidade]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}