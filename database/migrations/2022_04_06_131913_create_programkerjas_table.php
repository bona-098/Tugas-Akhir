<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramkerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programkerjas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('penanggung_jawab');
            $table->string('pengurus');
            $table->string('landasan_kegiatan');
            $table->string('tujuan_kegiatan');
            $table->string('objek_segmentasi');
            $table->string('deskripsi');
            $table->string('parameter_keberhasilan');
            $table->string('kebutuhan_dana')->nullable();
            $table->string('sumber_dana')->nullable();
            $table->string('jumlah_sdm');
            $table->string('kebutuhan_lain')->nullable();
            $table->timestamps();
            $table->foreignId('divisi_id')->constrained('divisis')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('kepengurusan_id')->constrained('kepengurusans')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programkerjas');
    }
}
