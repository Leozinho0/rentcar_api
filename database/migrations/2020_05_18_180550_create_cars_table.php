<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('modelo', 100);
            $table->enum('marca', ['Fiat', 'GM', 'Volkswagen']);
            $table->enum('tipo', ['Passeio', 'SUV', 'Caminhonete']);
            $table->year('ano');
            $table->string('placa', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
