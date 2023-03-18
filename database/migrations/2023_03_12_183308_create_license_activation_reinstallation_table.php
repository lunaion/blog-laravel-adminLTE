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
        Schema::create('license_activation_reinstallation', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('license_activation_id');
            $table->unsignedBigInteger('reinstallation_id');

            $table->foreign('license_activation_id')->references('id')->on('license_activations')->onDelete('cascade')
                                                                                                    ->onUpdate('cascade');
            $table->foreign('reinstallation_id')->references('id')->on('reinstallations')->onDelete('cascade')
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
        Schema::dropIfExists('license_activation_reinstallation');
    }
};
