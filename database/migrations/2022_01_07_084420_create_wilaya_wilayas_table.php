<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWilayaWilayasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wilaya_wilayas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wilaya_depart_id')->constrained()->onDelete('cascade');
            $table->foreignId('wilaya_arriver_id')->constrained()->onDelete('cascade');
            $table->double('tarif')->nullable();
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
        Schema::dropIfExists('wilaya_wilayas');
    }
}
