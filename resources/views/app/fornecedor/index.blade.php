<h3>fornecedor</h3>
@php

//if (empty($variavel){} //retorna true se a variavel estiver vazia


@endphp
@isset($fornecedores)

    @forelse ($fornecedores as $indice => $fornecedor)
        Interação atual: {{$loop->iteration}}
        <br>
        Fornecedor:{{$fornecedor['nome']}};
        <br>
        Status:{{$fornecedor['status']}};
        <br>
        CNPJ:{{$fornecedor['cnpj'] ?? 'Dado não foi preenchido'}};
        <br>
        Telefone:({{$fornecedor['ddd'] ?? ''}}) {{
            $fornecedor['telefone'] ?? '' }};
        <br>
        @if ($loop->first)
        Primeira interação
        @endif
        @if ($loop->last)
        Ultima interação
            <br>
            Total de registros {{$loop->count}}
        @endif
        <hr>
    @empty
        Não existem fornecedores cadsatrados!!!
    @endforelse
@endisset





