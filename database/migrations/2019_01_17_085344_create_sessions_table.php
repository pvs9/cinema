<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->charset = 'utf8mb4';
			$table->collation = 'utf8mb4_unicode_ci';
            $table->increments('id');
            $table->unsignedDecimal('coefficient');
            $table->dateTime('date');
            $table->unsignedInteger('hall_id');
            $table->unsignedInteger('film_id');
			$table->foreign('hall_id')
				->references('id')
				->on('halls')
				->onDelete('cascade');
			$table->foreign('film_id')
				->references('id')
				->on('films')
				->onDelete('cascade');
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
        Schema::dropIfExists('sessions');
    }
}
