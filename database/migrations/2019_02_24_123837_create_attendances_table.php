<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('activity_id')->unsigned();
            $table->integer('part_id')->unsigned();
            $table->string('name', 30);  // sqlite では文字列の長さは指定しても意味がない
            $table->integer('attendance')->nullable();
            $table->string('comment', 140)->nullable();  // sqlite では文字列の長さは指定しても意味がない
            $table->timestamps();
            $table->foreign('activity_id')
                    ->references('id')
                    ->on('activities')
                    ->onDelete('cascade');
            $table->foreign('part_id')
                    ->references('id')
                    ->on('parts')
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
        Schema::dropIfExists('attendances');
    }
}
