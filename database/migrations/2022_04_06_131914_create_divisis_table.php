<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divisis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kadiv');
            $table->string('staffahli');
            $table->string('staff');
            $table->string('visi');
            $table->string('misi');
            $table->timestamps();
            // $table->foreignId('programkerja_id')->constrained('programkerjas')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('divisis');
    }
}
