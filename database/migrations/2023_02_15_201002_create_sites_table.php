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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug');
            $table->string('address');
            $table->string('phone');
            $table->string('email');

            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')
                                                                        ->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')
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
        Schema::dropIfExists('sites');
    }
};
