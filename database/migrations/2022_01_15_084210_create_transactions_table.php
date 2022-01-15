<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('annonce_id')->constrained()->nullable();
            $table->foreignId('client_id')->constrained()->nullable();
            $table->foreignId('transporteur_id')->constrained()->nullable();
            $table->enum('contenu',['il vous demande de vous transporter', 'il vous demande de le transporter']);
            $table->enum('status',['acceptée', 'en attente', 'refusée'])->default('en attente');

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
        Schema::dropIfExists('transactions');
    }

}
