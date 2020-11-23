<?php

use App\Models\Organization;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Organization::firstOrCreate([
			'name' => 'Secretaria Municipal de Administração',
			'acronym' => 'SEMAD',
			'is_active' => 1,
			'pmm_id' => '83',
		]);

		Organization::firstOrCreate([
			'name' => 'Secretaria Municipal de Saúde',
			'acronym' => 'SENSA',
			'is_active' => 1,
			'pmm_id' => '122',
		]);
	}
}
