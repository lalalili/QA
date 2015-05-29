<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubVersionsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('mysql')->create('sub_versions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('version_id');
            //$table->foreign('version_id')->references('id')->on('versions');
			$table->string('name', 255);
			$table->string('notes', 255)->nullable();
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
//        Schema::connection('mysql')->table('sub_versions', function($table)
//        {
//            $table->dropForeign('sub_versions_version_id_foreign');
//        });
        Schema::connection('mysql')->drop('sub_versions');
	}

}
