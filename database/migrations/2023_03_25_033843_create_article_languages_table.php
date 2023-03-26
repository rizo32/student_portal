<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleLanguagesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('article_languages', function (Blueprint $table) {
      $table->foreignId('language_id')->constrained()->onDelete('cascade');
      $table->foreignId('article_id')->constrained()->onDelete('cascade');
      $table->string('title', 100);
      $table->text('body');
      $table->timestamps();

      $table->primary(['article_id', 'language_id']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('article_languages');
  }
}