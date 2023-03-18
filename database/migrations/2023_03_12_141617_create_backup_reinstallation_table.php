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
        Schema::create('backup_reinstallation', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('backup_id');
            $table->unsignedBigInteger('reinstallation_id');

            $table->foreign('backup_id')->references('id')->on('backups')->onDelete('cascade')
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
        Schema::dropIfExists('backup_reinstallation');
    }
};
