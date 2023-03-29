<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    
    Schema::create('documents', function (Blueprint $table) {
      $table->id();
      $table->string('title_en', 50)->nullable();
      $table->string('title_fr', 50)->nullable();
      $table->foreignId('user_id')->constrained()->onDelete('cascade');
      $table->string('path', 100);
      $table->foreignId('format_id')->constrained()->onDelete('cascade');
      $table->timestamps();
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
    Schema::dropIfExists('documents');
  }
}