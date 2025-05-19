<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayanangerejaTable extends Migration
{
    public function up()
    {
        Schema::create('layanangereja', function (Blueprint $table) {
            $table->id();
            
            $table->string('jenis_layanan'); // contoh: martuppol, naik_sidi, pernikahan, dll
            $table->boolean('status_aktif')->default(true); // apakah layanan tersedia atau tidak
            
            // Data umum jemaat
            $table->string('nama_jemaat');
            $table->string('alamat')->nullable();
            $table->string('no_telepon')->nullable();

            // Kolom upload dokumen (opsional, nullable)
            $table->string('surat_keterangan_warga')->nullable();
            $table->string('surat_baptis')->nullable();
            $table->string('surat_naik_sidi')->nullable();
            $table->string('surat_martuppol')->nullable();
            $table->string('akta')->nullable(); // untuk naik sidi
            $table->string('dokumen_pranikah')->nullable(); // untuk nikah
            
            // Khusus form lain:
            $table->string('lingkungan')->nullable(); // untuk jenazah
            $table->date('tanggal_layanan')->nullable(); // tanggal layanan, dengan disable tanggal masa depan
            
            // Untuk info tambahan
            $table->text('keterangan')->nullable();
            $table->string('wijk')->nullable(); // untuk form jemaat sakit (ganti keterangan penyakit)
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('layanangereja');
    }
}
