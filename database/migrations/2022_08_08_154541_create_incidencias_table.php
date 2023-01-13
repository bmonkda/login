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
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id();

            // $table->string('name');
            $table->string('titulo');
            $table->string('slug');

            $table->longText('descripcion');

            // $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade')->nullable();
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade')->nullable();
            
            $table->foreignId('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
            
            $table->foreignId('emergency_id')->references('id')->on('emergencies')->onDelete('cascade');

            $table->foreignId('estatu_id')->default(1)->references('id')->on('estatus')->onDelete('cascade');
            
            // $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->references('idusuario')->on('users')->onDelete('cascade');
            // $table->integer('user_id')->nullable();
            
            
            // $table->integer('asignado_a')->references('id')->on('users')->nullable();
            // $table->integer('asignado_por')->nullable();
            
            
            /* estas lineas son para modificar sin la convensión de Laravel 
                quien y a quien se le asina la incidencia */
            
            //usuario que crea la incidencia
            // $table->foreignId('crea_id')->references('id')->on('users')->onDelete('cascade');
            
            //usuario que se le ha asignado la incidencia
            $table->foreignId('asignado_id')->nullable()->references('id')->on('users');
            $table->foreignId('asigna_id')->nullable()/*->references('id')->on('users')*/;
            
            //usuario que asigna la incidencia
            // $table->foreignId('asigna_id')->nullable()->references('id')->on('users');



            // $table->enum('status', [1, 2])->default(1);
            //foreignId('estatu_id') default(1)->references('id')->on('estatus')->onDelete('cascade');
            
            // esta es la linea que tengo antes de probar
            
            // $table->foreignId('estatu_id')->nullable()->references('id')->on('estatus')->onDelete('cascade');

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
        Schema::dropIfExists('incidencias');
    }
};
