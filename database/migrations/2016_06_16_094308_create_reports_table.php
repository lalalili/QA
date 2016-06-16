<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('server');
            $table->string('company');
            $table->string('result');
            $table->string('note1');
            $table->string('note2');
            $table->string('note3');
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
        Schema::connection('mysql')->drop('reports');
    }
}
