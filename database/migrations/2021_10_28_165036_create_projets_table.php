<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
           // $table->string('nom')->unique();
            $table->string("nom");
            $table->date('date_debut');
            $table->date('date_fin');
            // $table->string('duree');
            $table->longText('description');
            $table->foreignId("statut_id")->default(1)->constrained();
            // $table->foreignId("tache_id")->constrained();
            $table->foreignId("user_id")->constrained();
            $table->foreignId("departement_id")->constrained();

            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("projets",function(Blueprint $table){
            $table->dropForeign(["statut_id","user_id","departement_id"]);
          });
        Schema::dropIfExists('projets');
    }
}
