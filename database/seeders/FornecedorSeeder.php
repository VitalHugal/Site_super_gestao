<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //instanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor-> nome = 'Forncedor 100';
        $fornecedor-> site = 'forncedor100.com.br';
        $fornecedor-> uf = 'CE';
        $fornecedor-> email = 'contato@forncedor100.com.br';
        $fornecedor-> save();

        //metodo create(atenção para atributo fillable da classe)
        Fornecedor::create([
            'nome' => 'Fornecedor 200',
            'site' => 'fornecedor200.com.br',
            'uf' => 'RS',
            'email' => 'contato@fornecedor200.com.br',
        ]);

        //insert
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 300',
            'site' => 'fornecedor300.com.br',
            'uf' => 'SP',
            'email' => 'contato@fornecedor300.com.br',
        ]);
    }
}
