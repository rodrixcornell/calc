<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRubricsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rubrics', function (Blueprint $table) {
			$table->id();

			$table->string('name')->comment('nomenclature');
			$table->integer('nb_prodam');
			$table->enum('is_active', [0, 1])->default(0)->comment('0 = Inativo, 1 = Ativo');

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
		Schema::dropIfExists('rubrics');
	}
}
