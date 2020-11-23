<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEarningRubricTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('earning_rubric', function (Blueprint $table) {
			// $table->id();

			$table->foreignId('earning_id')->index();
			$table->foreignId('rubric_id')->index();

			$table->foreign('earning_id')->references('id')->on('earnings')->onDelete('cascade');
			$table->foreign('rubric_id')->references('id')->on('rubrics')->onDelete('cascade');
			$table->unique(['earning_id', 'rubric_id'], 'rubric_earning_foreign');

			// $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Schema::hasTable('rubric_earning', function (Blueprint $table) {
		// 	$table->dropForeign(['earning_id', 'rubric_id']);
		// });
		Schema::dropIfExists('earning_rubric');
	}
}
