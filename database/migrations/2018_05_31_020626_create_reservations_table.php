<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');

            $table->integer('book_copy_id')->unsigned();


            $table->integer('member_id')->unsigned();

            $table->date('dueDate');

            /**
             * 0: not returned
             * 1: returned
             */
            $table->integer('returnStatus');

            $table->timestamp('returnDate');
            $table->double('fine', 4, 2)->default(0.0);

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
        Schema::dropIfExists('reservations');
    }
}
