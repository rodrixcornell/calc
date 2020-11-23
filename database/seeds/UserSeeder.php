<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		User::firstOrCreate(
			[
				'name' => 'Administrador',
				'email' => 'admin@email.com',
				'password' => Hash::make('admin'),
				'remember_token' => Str::random(10),
			],
			[
				'username' => 'admin',
				'is_admin' => 1,
				'is_active' => 1,
				'cpf' => '12345678900',
				'matricula' => '1000-0A',
			],
		);

		$usersQuantity = 99;

		factory(User::class, $usersQuantity)->create()->each(function ($users) {
			// print_r($users);
			// $users->person()->save(factory(Person::class)->make());
			$users->save();
		});
	}
}
