<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->date('act_at');
            $table->integer('place_id')->unsigned()->nullable();
            $table->integer('time_id')->unsigned()->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
            $table->foreign('place_id')
                    ->references('id')
                    ->on('places')
                    ->onDelete('cascade');
            $table->foreign('time_id')
                    ->references('id')
                    ->on('times')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
