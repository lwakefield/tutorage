<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->integer('tutor_id');
            $table->integer('direction');
            $table->timestamps();
        });
        Schema::table('users', function(Blueprint $table) {
            $table->integer('score');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('score');
        });
    }
}
