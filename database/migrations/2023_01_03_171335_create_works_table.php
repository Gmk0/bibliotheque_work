<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string("sujet");
            $table->string("categorie");
            $table->string("faculte");
            $table->string("etudiant");
            $table->string("annnee_etude");
            $table->string("nbr_pages");
            $table->string("path_document");
            $table->string("id_document")->nullable();
            $table->boolean("status");
            $table->bigInteger("viewCounter");
            $table->unsignedBigInteger("domaines_id")->nullable();
            $table->foreign("domaines_id")->references('id')->on("domaines");
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
        Schema::dropIfExists('works');
    }
};
