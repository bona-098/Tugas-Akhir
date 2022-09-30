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
            $table->string('nama');
            $table->string('nim');
            $table->string('pencapaian');
            $table->string('dospem');
            $table->string('kategori');
            $table->string('nama_kegiatan');
            $table->string('penyelenggara');
            $table->date('waktu');
            $table->string('tempat');
            $table->string('foto');
            $table->foreignId('kepengurusan_id')->constrained('kepengurusans')->onDelete('restrict')->onUpdate('cascade');
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
