<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taches', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->float("valeur");
            $table->boolean("Estrealisee")->default(0);
            $table->date('dateDebut');
            $table->foreignId("projet_id")->references("id")->on("projets")->constrained();
            $table->date('dateFin');
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
        Schema::table("taches",function(Blueprint $table){
            $table->dropForeign(["projet_id"]);
          });
        Schema::dropIfExists('taches');
    }
}
