<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado', function (Blueprint $table){
            $table -> id();
            $table -> string('estado');
        });

        Schema::create('municipios', function (Blueprint $table) {
            $table->id();
            $table->string('municipio');
            
            $table->foreignId('estado_id')
                  ->references('id')
                  ->on('estado')
                  ->comment('Referencia del estado')
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
        Schema::dropIfExists('estado');
        Schema::dropIfExists('municipios');
    }
}
