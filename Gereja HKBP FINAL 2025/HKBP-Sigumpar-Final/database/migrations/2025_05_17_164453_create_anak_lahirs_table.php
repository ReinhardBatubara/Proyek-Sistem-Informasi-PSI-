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
        Schema::create('anak_lahirs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_anak');
            $table->date('tanggal_lahir');
            $table->string('nama_ortu');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anak_lahirs');
    }
};
