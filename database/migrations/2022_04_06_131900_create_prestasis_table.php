<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->string('jenis_kegiatan');
            $table->string('partisipasi');
            $table->string('deskripsi');
            $table->string('sertifikat');
            $table->string('penyelenggara');
            $table->date('waktu');
            $table->string('tempat');
            $table->foreignId('kepengurusan_id')->constrained('kepengurusans')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('prestasis');
    }
}
