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
        Schema::create('pengukuran', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->bigInteger('siklus_id')->unsigned()->nullable();
            $table->bigInteger('audity_id')->unsigned()->nullable();
            $table->bigInteger('standard_id')->unsigned()->nullable();
            $table->bigInteger('indikator_id')->unsigned()->nullable();
            $table->string('pengukuran');
            $table->year('tahun');
            $table->bigInteger('target_id')->unsigned()->nullable();
            $table->string('capaian_kinerja');
            $table->string('capaian_ukuran');
            $table->string('link_dokumen');
            $table->string('status');
            $table->string('catatan_auditor1');
            $table->string('catatan_auditor2');
            $table->string('catatan_lapangan');
            $table->string('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengukuran');
    }
};