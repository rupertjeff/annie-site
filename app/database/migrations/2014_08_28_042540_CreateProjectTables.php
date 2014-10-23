<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function (Blueprint $table)
		{
			$table->increments('id');

			$table->string('name');
			$table->text('description')->nullable();

			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('project_tag', function (Blueprint $table)
		{
			$table->increments('id');

			$table->integer('project_id')->unsigned();
			$table->integer('tag_id')->unsigned();
			$table->integer('sort')->default(0);

			$table->timestamps();

			$table->unique(['project_id', 'tag_id']);
			$table->index('sort');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('project_tag');
		Schema::dropIfExists('projects');
	}

}
