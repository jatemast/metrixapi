<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('tbl_usuarios', function (Blueprint $table) {
            $table->timestamps(); // Esto agregará las columnas created_at y updated_at
        });
    }
    
    public function down()
    {
        Schema::table('tbl_usuarios', function (Blueprint $table) {
            $table->dropTimestamps(); // Elimina las columnas created_at y updated_at
        });
    }
    
};
