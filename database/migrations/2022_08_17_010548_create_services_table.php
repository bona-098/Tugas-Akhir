<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();                        
            $table->date('hari')->nullable();            
            $table->integer('sesi')->nullable();            
            $table->string('no_hp')->nullable();
            $table->string('pesan')->nullable();            
            $table->string('status')->nullable();            
            $table->string('foto')->nullable();            
            // $table->string('user_id')->nullable();
            $table->foreignId('teknisi_id')->constrained('teknisi')->onDelete('restrict')->onUpdate('cascade');          
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
        Schema::dropIfExists('service');
    }
}
