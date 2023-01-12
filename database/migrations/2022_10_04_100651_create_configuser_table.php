<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuser', function (Blueprint $table) {
            $table->id();
            
            // $table->foreignId('user_id')->references('idusuario')->on('acceso.usuarios');
            // $table->foreignId('gerencia_id')->references('idunidadestructura')->on('rrhh.emp_unidadestructura');

            $table->integer('idgerencia');
            $table->integer('iddivisionqas');
            $table->integer('iddivisionsistemas');
            $table->integer('iddivisionbasededatos');
            $table->integer('iddivisionsoportecaronisur');
            $table->integer('iddivisionsoporteoeste');
            $table->integer('iddivisiontelecomunicaciones');
            $table->integer('idstatus');
            $table->integer('idusuarioregistro')->nullable(); /* acepta null por pruebas */

            $table->timestamp('fecharegistro')->nullable();
            $table->timestamp('fechaactualizado')->nullable();

            // $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configuser');
    }
};
