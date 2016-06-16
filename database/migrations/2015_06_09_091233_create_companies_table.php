<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('mysql')->create('companies', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('site');
            $table->unsignedInteger('acct_company_id');
            $table->string('name');
            $table->string('code');
            $table->string('display_name');
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
		Schema::connection('mysql')->drop('companies');
	}

}
