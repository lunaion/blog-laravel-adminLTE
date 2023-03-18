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
        Schema::create('general_validation_reinstallation', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('general_validation_id');
            $table->unsignedBigInteger('reinstallation_id');

            $table->foreign('general_validation_id')->references('id')->on('general_validations')->onDelete('cascade')
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
        Schema::dropIfExists('general_validation_reinstallation');
    }
};
