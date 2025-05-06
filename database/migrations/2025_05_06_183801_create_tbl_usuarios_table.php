<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Verifica si la tabla ya existe antes de intentar crearla
        if (!Schema::hasTable('tbl_usuarios')) {
            Schema::create('tbl_usuarios', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('area_id')->nullable();
                $table->string('cargo', 100)->nullable();
                $table->string('nombre', 100)->nullable();
                $table->string('correo', 150)->unique(); // obligatorio
                $table->string('telefono', 50)->nullable();
                $table->string('contrasena', 255); // obligatorio
                $table->enum('rol', ['master', 'administrador', 'cliente', 'sistemas'])->nullable()->default('cliente');
                $table->timestamp('fecha_registro')->nullable()->useCurrent();
                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        // Esto debería eliminar la tabla solo si no existe ya
        Schema::dropIfExists('tbl_usuarios');
    }
};
