<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJemaatsTable extends Migration
{
    public function up()
    {
        Schema::create('jemaats', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // kolom nama jemaat
            $table->string('alamat')->nullable(); // contoh kolom alamat
            $table->string('no_hp')->nullable(); // contoh kolom nomor hp
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jemaats');
    }
}

