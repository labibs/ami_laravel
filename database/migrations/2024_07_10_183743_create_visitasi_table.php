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
        Schema::create('visitasi', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->bigInteger('siklus_id')->unsigned()->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('audity_id')->unsigned()->nullable();
            $table->bigInteger('standard_id')->unsigned()->nullable();
            $table->bigInteger('indikator_id')->unsigned()->nullable();
            $table->bigInteger('pengukuran_id')->unsigned()->nullable();
            $table->string('ktb_obs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitasi');
    }
};