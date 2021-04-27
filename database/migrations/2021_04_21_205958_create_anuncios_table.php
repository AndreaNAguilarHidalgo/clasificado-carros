<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tabla condición del auto
        Schema::create('condicions', function (Blueprint $table) {
            $table->id();
            $table->string('estado');
            
            $table->timestamps();
        });

        // Tabla tipo de combustible
        Schema::create('combustibles', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            
            $table->timestamps();
        });

        // Tabla de tipo de carros
        Schema::create('tipo_carros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('anuncios', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('año');
            $table->integer('total_puertas');
            $table->double('precio');
            $table->double('kilometraje');
            $table->text('descripcion');
            $table->foreignId('user_id')
                        ->references('id')
                        ->on('users')
                        ->comment('El usuario que crea el anuncio')
                        ->onDelete('cascade');

            $table->foreignId('carro_id')
                        ->references('id')
                        ->on('tipo_carros')
                        ->comments(' Clasificado de carro')
                        ->onDelete('cascade');

            $table->foreignId('combustible_id')
                        ->references('id')
                        ->on('combustibles')
                        ->comments(' Tipo de combustible')
                        ->onDelete('cascade');

            $table->foreignId('condicion_id')
                        ->references('id')
                        ->on('condicions')
                        ->comments(' Condición del Auto')
                        ->onDelete('cascade');

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
        Schema::dropIfExists('combustibles');
        Schema::dropIfExists('condicions');
        Schema::dropIfExists('tipo_carros');
        Schema::dropIfExists('anuncios');
    }
}
