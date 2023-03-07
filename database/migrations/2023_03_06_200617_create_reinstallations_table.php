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
        Schema::create('reinstallations', function (Blueprint $table) {
            $table->id();

            $table->string('ticket');
            
            $table->unsignedBigInteger('tecnico_id');
            
            $table->foreign('tecnico_id')->references('id')->on('users')->onDelete('cascade')
                                                                        ->onUpdate('cascade');

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
        Schema::dropIfExists('reinstallations');
    }
};
