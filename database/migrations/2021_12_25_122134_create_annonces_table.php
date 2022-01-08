<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnoncesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->longText('img');
            $table->longText('texte');            
            $table->foreignId('wilaya_wilaya_id')->constrained();
            $table->enum('transport_type', ['lettre', 'colis','meuble','électroménager','déménagement']);
            $table->enum('fourchette_poid_min', ['0','100g','500g','1kg','5kg','10kg','50kg']);
            $table->enum('fourchette_poid_max', ['100g','500g','1kg','5kg','10kg','50kg','100kg']);
            $table->enum('fourchette_volume_min', ['0','100l','500l','1kl','5kl','10kl','50kl']);
            $table->enum('fourchette_volume_max', ['100l','500l','1kl','5kl','10kl','50kl','100kl']);
            $table->enum('moyen_transport', ['camion', 'bus', 'voiture', 'moto']);
            $table->enum('status',['validée', 'en attente', 'terminée'])->default('en attente');
            $table->double('tarif')->nullable();

            $table->foreignId('user_id')->constrained();
            $table->foreignId('tranporteur_id')->constrained()->nullable();

            $table->boolean('archiver')->default(0);
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
        Schema::dropIfExists('annonces');
    }
}
