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
            // $table->foreignId('user_id')->constrained('users')->onDelete('restrict')->onUpdate('cascade');
            $table->string('nama');
            $table->string('tahun');
            $table->string('pembina');
            // $table->string('anggotas_id');
            // $table->string('programkerjas_id');
            // $table->string('prestasis_id');
            // $table->string('service_id');
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
        Schema::dropIfExists('kepengurusans');
    }
}
