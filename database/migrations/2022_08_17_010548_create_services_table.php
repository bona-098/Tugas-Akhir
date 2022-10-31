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
            $table->string('nama');                        
            $table->string('hari');            
            $table->string('sesi');            
            $table->string('no_hp');
            $table->string('pesan')->nullable();            
            $table->tinyInteger('status')->default('1');         
            // $table->string('foto')->nullable();            
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
