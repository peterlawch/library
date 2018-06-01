<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookcopiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookcopies', function (Blueprint $table) {
            $table->increments('id');
            /**
             * Status:
             * 0: On loan
             * 1: Active
             * 2: Lost
             * 3: Damaged
             * 4: withdrawn
             */
            $table->integer('status');
            $table->integer('book_id')->unsigned();
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
        Schema::dropIfExists('bookcopies');
    }
}
