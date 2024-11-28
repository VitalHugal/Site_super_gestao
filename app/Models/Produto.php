<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    public function produtoDetalhe()
    {
        return $this->hasOne('App\Models\ProdutoDetalhe');

        // produto tem 1 produtoDetalhe
        // 1 registro relacionado em produto-detalhe (fk) -> produto_id
        // produtos (pk) -> id
    }
}