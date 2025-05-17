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
        Schema::create('kunjungan_makams', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jemaat');
            $table->date('tanggal_kunjungan');
            $table->boolean('pendeta_ikut')->default(false);
            $table->boolean('kunci_disediakan')->default(false);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kunjungan_makams');
    }
};
