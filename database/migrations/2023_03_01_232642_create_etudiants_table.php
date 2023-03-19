<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    Schema::create('etudiants', function (Blueprint $table) {
      // $table->id();
      $table->foreignId('user_id')->constrained()->onDelete('cascade');
      $table->string('nom', 50);
      $table->string('adresse', 100);
      $table->string('phone', 20);
      // $table->string('email', 50);
      $table->date('date_naissance');
      $table->foreignId('ville_id')->constrained()->onDelete('cascade');
      $table->timestamps();

      $table->primary('user_id');
    });

    DB::statement('SET FOREIGN_KEY_CHECKS=1;');

  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('etudiants');
  }
}