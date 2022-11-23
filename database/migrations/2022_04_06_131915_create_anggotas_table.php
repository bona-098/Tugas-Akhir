<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nim');
            $table->string('alasan_satu');
            $table->string('pilihan_dua');
            $table->string('alasan_dua');
            $table->string('pindah_divisi');
            $table->string('motivasi');
            $table->string('komitmen');
            $table->string('cv');
            $table->string('porto')->nullable();
            $table->enum('status',['berkas','wawancara','anggota','gagal'])->default('berkas');
            $table->timestamps();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('divisi_id')->constrained('divisis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('kepengurusan_id')->constrained('kepengurusans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggotas');
    }
}
