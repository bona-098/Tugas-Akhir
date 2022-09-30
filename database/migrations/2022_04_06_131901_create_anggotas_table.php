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
            $table->string('prodi');
            $table->string('no_telp');
            $table->string('resume');
            $table->string('transkip');
            $table->string('surat_rekomendasi');
            $table->string('sertifikat');
            $table->string('status')->nullable();
            $table->timestamps();
            // $table->foreignId('kepengurusan_id')->constrained('kepengurusans')->onDelete('restrict')->onUpdate('cascade');
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
