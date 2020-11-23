<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organizations', function (Blueprint $table) {
			$table->id();

			$table->string('name');
			$table->string('acronym')->unique();
			$table->enum('is_active', [0, 1])->default(0)->comment('0 = Inativo, 1 = Ativo');
			$table->integer('prodam_id')->nullable();
			$table->integer('pmm_id')->nullable();
			$table->integer('afim_id')->nullable();

			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('organizations');
	}
}
