<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion'); //TEXT
            $table->decimal('precio', 10,2); // DECIMAL (10,2)
            $table->string('imagen', 100); //VARCHAR (100)

            // Añadiendo Soft Deletes
            $table->softDeletes();

            $table->unsignedBigInteger('categoria_id'); //BIGINT(20)
            $table->unsignedBigInteger('vendedor_id'); //BIGINT

            // CREAMOS LA FK "CATEGORIA" QUE HACE REFERENCIA AL "ID" DE LA TABLA CATEGORIA
            $table->foreign('categoria_id')->references('id')->on('categorias');

            // CREAMOS LA FK "VENDEDOR_ID" QUE HACE REFERENCIA AL "ID" DE LA TABLA "USERS"
            $table->foreign('vendedor_id')->references('id')->on('users');
            $table->timestamps();   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
         // Quitar Soft Deletes
         Schema::table('productos', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Esto elimina la columna "deleted_at" de la tabla
        });
        
        Schema::dropIfExists('productos');
    }
};
