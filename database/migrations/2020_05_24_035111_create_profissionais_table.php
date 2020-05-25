<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfissionaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profissionais', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->date('nascimento');
            $table->string('fone', 50);
            $table->string('email', 100)->unique();
            $table->foreignId('estado_id')->constrained('estados');
            $table->foreignId('cidade_id')->constrained('cidades');
            $table->foreignId('profissao_id')->constrained('profissoes');
            $table->string('upload')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profissionais');
    }
}
