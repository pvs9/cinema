<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCinemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cinemas', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->charset = 'utf8mb4';
			$table->collation = 'utf8mb4_unicode_ci';
            $table->increments('id');
            $table->string('name');
			$table->string('address');
			$table->string('email')->unique();
			$table->string('phone')->unique();
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
        Schema::dropIfExists('cinemas');
    }
}
