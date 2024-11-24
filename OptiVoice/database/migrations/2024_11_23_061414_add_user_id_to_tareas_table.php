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
        Schema::table('tareas', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id'); // Agregar user_id después de id
            $table->foreign('user_id')->references('id')->on('cuentas')->onDelete('cascade'); // Relación con la tabla 'cuentas'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tareas', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Eliminar la clave foránea
            $table->dropColumn('user_id');    // Eliminar la columna
        });
    }
};
