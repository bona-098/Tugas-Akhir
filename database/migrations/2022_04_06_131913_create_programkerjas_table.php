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
            $table->date('waktu');
            $table->string('tempat');
            $table->string('deskripsi');
            $table->string('gambar');
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict')->onUpdate('cascade');
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
