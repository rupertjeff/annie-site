<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('images', function (Blueprint $table)
		{
			$table->increments('id');

			$table->string('file');
			$table->string('alt');
			$table->text('caption');

			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('image_project', function (Blueprint $table)
		{
			$table->increments('id');
			$table->integer('image_id')->unsigned();
			$table->integer('project_id')->unsigned();

			$table->timestamps();

			$table->integer('sort')->default(0);

			$table->unique(['image_id', 'project_id']);
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
		Schema::dropIfExists('image_project');
		Schema::dropIfExists('images');
	}

}
