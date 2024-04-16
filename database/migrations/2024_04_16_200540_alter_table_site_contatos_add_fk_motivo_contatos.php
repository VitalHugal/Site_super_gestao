<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //adicionando a coluna motivo_contatos_id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id');

        });
        //atribuindo motivo_contatos para a nova motivo_contatos_id
        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');

        //criando da fk e remover a coluna motivo contato
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{

        //remover a fk e adicionar a coluna motivo contato
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivo_contato');
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');

        //atribuindo motivo_contatos_id para a nova motivo_contatos
        DB::statement('update site_contatos set  motivo_contato = motivo_contatos_id');

        });
         //remover a coluna motivo_contatos_id
         Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contatos_id');

        });
    }
};
