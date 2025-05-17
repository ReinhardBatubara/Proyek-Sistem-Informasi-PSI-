<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('naik_sidis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jemaat');
            $table->unsignedBigInteger('batch_id');
            $table->string('akta_upload')->nullable();
            $table->string('surat_baptis_upload')->nullable();
            $table->timestamps();

            $table->foreign('batch_id')->references('id')->on('batch_naik_sidis')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('naik_sidis');
    }
};
