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
            // $table->tinyInteger('status')->default('1');  
            $table->enum('status',['proses','selesai'])->default('proses');       
            $table->timestamps();
            // $table->foreign('user_id')->references('id')->on('users');         
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');          
            $table->foreignId('teknisi_id')->constrained('teknisi')->onDelete('cascade')->onUpdate('cascade');          
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