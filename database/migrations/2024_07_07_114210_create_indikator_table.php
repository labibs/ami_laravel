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
        Schema::create('indikator', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('standard_id')->unsigned()->nullable();
            $table->string('kode');
            $table->string('indikator');
            $table->string('rujukan_paps');
            $table->string('rujukan_papt');
            $table->string('dokumen');
            $table->string('audity');
            $table->string('pemangku_kepentingan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator');
    }
};