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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('site_id');
            
            $table->foreign('tecnico_id')->references('id')->on('users')->onDelete('cascade')
                                                                        ->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')
                                                                    ->onUpdate('cascade');
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade')
                                                                    ->onUpdate('cascade');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade')
                                                                            ->onUpdate('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')
                                                                        ->onUpdate('cascade');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade')
                                                                    ->onUpdate('cascade');

            $table->string('location_details');
            $table->integer('machines');
            $table->text('backups_observations')->nullable();
            $table->text('validations_software')->nullable();
            $table->text('validations_observations')->nullable();
            $table->text('general_observation')->nullable();

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
