<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder{
     /**
     * Run the database seeds.
     */
    public function run(): void
    {
         //instanciando o objeto
         $contato = new SiteContato();
         $contato->nome = 'Arianne';
         $contato->telefone = '11900001111';
         $contato->email = 'arianne@teste.com';
         $contato->motivo_contato = '2';
         $contato->mensagem = 'Parabens, pelo serviço prestado';
         $contato->save();

    }
}
