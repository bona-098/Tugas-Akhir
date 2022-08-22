<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKepengurusansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kepengurusans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tahun');
            $table->string('pembina');
            $table->string('bph');
            $table->string('pengurus_lain');
            $table->string('anggota');
            $table->string('program_kerja');
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
        Schema::dropIfExists('kepengurusans');
    }
}
