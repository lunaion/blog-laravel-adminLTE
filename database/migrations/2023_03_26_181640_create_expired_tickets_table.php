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
        Schema::create('expired_tickets', function (Blueprint $table) {
            $table->id();

            $table->string('ticket');
            $table->date('fecha_llegada');

            $table->unsignedBigInteger('asignado_por');
            $table->unsignedBigInteger('tecnico_sede');
            $table->unsignedBigInteger('site_id');
            $table->unsignedBigInteger('area_asignadora');

            $table->foreign('asignado_por')->references('id')->on('users')->onDelete('cascade')
                                                                            ->onUpdate('cascade');
            $table->foreign('tecnico_sede')->references('id')->on('users')->onDelete('cascade')
                                                                            ->onUpdate('cascade');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade')
                                                                        ->onUpdate('cascade');
            $table->foreign('area_asignadora')->references('id')->on('areas')->onDelete('cascade')
                                                                        ->onUpdate('cascade');
            
            $table->string('tiempo_vencimiento');
            $table->text('detalles');
            $table->text('solucion');
            $table->string('area_solucion');

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
        Schema::dropIfExists('expired_tickets');
    }
};
