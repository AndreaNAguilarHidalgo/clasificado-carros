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
        // Tabla marca y modelo
        Schema::create('marcas', function (Blueprint $table){
            $table -> id();
            $table -> string('marca');

            $table->timestamps();
        });

        Schema::create('modelos', function (Blueprint $table){
            $table -> id();
            $table -> string('modelo');

            $table->foreignId('marca_id')
                  ->references('id')
                  ->on('marcas')
                  ->comment('Referencia de la marca del auto');

            $table->timestamps();
        });
        // Tablas de municipios y estados 

        Schema::create('estados', function (Blueprint $table){
            $table -> id();
            $table -> string('estado');

            $table->timestamps();
        });

        Schema::create('municipios', function (Blueprint $table) {
            $table->id();
            $table->string('municipio');
            
            $table->foreignId('estado_id')
                  ->references('id')
                  ->on('estados')
                  ->comment('Referencia del estado');


            $table->timestamps();

        });

        /* ---------------------------------------------------------------------------- */

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

            // FK de estados
            $table->foreignId('estado_id')
                  ->references('id')
                  ->on('estados')
                  ->comments(' FK de estados')
                  ->onDelete('cascade');

            // FK de municipios
            $table->foreignId('municipio_id')
                  ->references('id')
                  ->on('municipios')
                  ->comments(' FK de municipios')
                  ->onDelete('cascade');

            $table->foreignId('marca_id')
                  ->references('id')
                  ->on('marcas')
                  ->comment('Referencia de la marca');

            $table->foreignId('modelo_id')
                  ->references('id')
                  ->on('marcas')
                  ->comment('Referencia del modelo');


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
        Schema::dropIfExists('marcas');
        Schema::dropIfExists('modelos');
        Schema::dropIfExists('estados');
        Schema::dropIfExists('municipios');
        Schema::dropIfExists('combustibles');
        Schema::dropIfExists('condicions');
        Schema::dropIfExists('tipo_carros');
        Schema::dropIfExists('anuncios');
    }
}
