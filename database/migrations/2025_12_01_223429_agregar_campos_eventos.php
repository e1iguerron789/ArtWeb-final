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
    Schema::table('eventos', function (Blueprint $table) {
        $table->unsignedBigInteger('user_id')->nullable();
        $table->unsignedBigInteger('categoria_interes_id')->nullable();
        $table->unsignedBigInteger('opcion_interes_id')->nullable();

        $table->string('titulo')->nullable();
        $table->text('descripcion')->nullable();

        $table->date('fecha')->nullable();
        $table->time('hora_inicio')->nullable();
        $table->time('hora_fin')->nullable();

        $table->string('direccion_texto')->nullable();
        $table->decimal('latitud', 10, 7)->nullable();
        $table->decimal('longitud', 10, 7)->nullable();
    });
}

public function down()
{
    Schema::table('eventos', function (Blueprint $table) {
        $table->dropColumn([
            'user_id',
            'categoria_interes_id',
            'opcion_interes_id',
            'titulo',
            'descripcion',
            'fecha',
            'hora_inicio',
            'hora_fin',
            'direccion_texto',
            'latitud',
            'longitud'
        ]);
    });
}
};
