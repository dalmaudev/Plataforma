<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('direccion')->nullable();
            $table->unsignedBigInteger('estadocivil_id')->nullable();
            $table->unsignedBigInteger('documento_id')->nullable();

            $table->unsignedBigInteger('pais_id')->nullable();
            $table->unsignedBigInteger('localidad_id')->nullable();
            $table->unsignedBigInteger('provincia_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('cp')->nullable();
            $table->text('observaciones')->nullable();


            $table->string('documento')->nullable();
            $table->date('caducidaddoc')->nullable();
            $table->date('fecingresoespaña')->nullable();
            $table->string('telefono',20)->nullable();
            $table->string('email')->nullable();
            $table->string('profesion')->nullable();
            $table->string('hijo1',2)->nullable();
            $table->string('hijo2',2)->nullable();
            $table->string('hijo3',2)->nullable();
            $table->string('hijo4',2)->nullable();
            $table->string('hijo5',2)->nullable();
            $table->string('hijo6',2)->nullable();
            $table->string('hijo7',2)->nullable();
            $table->string('hijo8',2)->nullable();
            $table->string('hijo9',2)->nullable();
            $table->string('hijo10',2)->nullable();
            $table->string('hijo11',2)->nullable();
            $table->string('hijo12',2)->nullable();
            $table->string('domifiscal')->nullable();
            $table->enum("certdigital", ["NO", "SI"]);
            $table->date('altaautonomo')->nullable();
            $table->string('numseguridad',60)->nullable();
            $table->string('cuentabanco',60)->nullable();
            $table->string('titularbanco',150)->nullable();
            $table->unsignedBigInteger('sexo_id')->nullable();
            $table->string('conocio')->nullable();
            $table->enum("firma", ["NO", "SI"]);
            $table->string('firmado',100)->nullable();


            $table->string('hijo',2)->nullable();;
            $table->string('nombrepadre')->nullable();
            $table->string('nombremadre')->nullable();
            $table->date('fecnac')->nullable();
            $table->date('alta')->nullable();
            $table->string('cifoto')->nullable();
            $table->string('avatar')->nullable();



            $table->foreign('estadocivil_id')->references('id')->on('estadocivils');
            $table->foreign('documento_id')->references('id')->on('documentos');

            $table->foreign('pais_id')->references('id')->on('pais');
            $table->foreign('localidad_id')->references('id')->on('localidads');
            $table->foreign('provincia_id')->references('id')->on('provincias');
            $table->foreign('user_id')->references('id')->on('users');

            $table->foreign('sexo_id')->references('id')->on('sexos');

            $table->string('foto')->nullable();
            $table->text('consulta')->nullable();
            $table->integer('tipo');

            // $table->foreignId('tipocliente_id')
            //     ->constrained('tipoclientes')
            //     ->cascadeOnDelete()
            //     ->restrictOnUpdate();

            $table->foreignId('delegacion_id')
                ->constrained('delegacions')
                ->cascadeOnDelete()
                ->restrictOnUpdate();

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
        Schema::dropIfExists('clientes');
    }
}
