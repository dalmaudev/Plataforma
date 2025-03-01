<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcesoclientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procesoclientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipoproceso_id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('proceso_id')->nullable();
            $table->date('fecpresentado')->nullable();
            $table->unsignedBigInteger('desicion_id')->nullable();
            $table->date('fecdesicion')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('presento_id')->nullable();
            $table->date('recursofecpresentado')->nullable();
            $table->unsignedBigInteger('recurso_id')->nullable();
            $table->date('recursofecdesicion')->nullable();
            $table->enum('pagoconsulta', ['SI', 'NO']);
            $table->text('observacion')->nullable();
            $table->text('abono',10)->nullable();
            $table->text('precioproceso',10)->nullable();
            $table->text('pendiente',10)->nullable();
            $table->foreign('tipoproceso_id')->references('id')->on('tipoprocesos');
            $table->foreign('cliente_id')->references('id')->on('clientes'); 
            $table->foreign('proceso_id')->references('id')->on('procesos'); 
            $table->foreign('desicion_id')->references('id')->on('desicions'); 
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->foreign('presento_id')->references('id')->on('presentos'); 
            $table->foreign('recurso_id')->references('id')->on('recursos');
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
        Schema::dropIfExists('procesoclientes');
    }
}
