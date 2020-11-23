<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationUserTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organization_user', function (Blueprint $table) {
			// $table->id();

			$table->foreignId('organization_id')->index();
			$table->foreignId('user_id')->index();

			$table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->unique(['organization_id', 'user_id'], 'organization_user_foreign');

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
		// Schema::hasTable('organization_user', function (Blueprint $table) {
		// 	$table->dropForeign(['organization_id', 'user_id']);
		// });
		Schema::dropIfExists('organization_user');
	}
}
