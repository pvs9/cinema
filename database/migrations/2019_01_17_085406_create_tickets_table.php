<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->charset = 'utf8mb4';
			$table->collation = 'utf8mb4_unicode_ci';
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('session_id');
            $table->unsignedInteger('seat_id');
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');
			$table->foreign('session_id')
				->references('id')
				->on('sessions')
				->onDelete('cascade');
			$table->foreign('seat_id')
				->references('id')
				->on('seats')
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
        Schema::dropIfExists('tickets');
    }
}
