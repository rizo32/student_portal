<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    Schema::create('students', function (Blueprint $table) {
      $table->foreignId('user_id')->constrained()->onDelete('cascade');
      $table->string('name', 50);
      $table->string('address', 100)->nullable();
      $table->string('phone', 20)->nullable();
      $table->date('birthday')->nullable();
      $table->foreignId('city_id')->constrained()->onDelete('cascade');
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
    Schema::dropIfExists('students');
  }
}