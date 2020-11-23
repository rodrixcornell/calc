<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
	return [
		'name' => $faker->name,
		'email' => $faker->unique()->safeEmail,
		'email_verified_at' => now(),
		'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
		'remember_token' => Str::random(10),

		'username' => $faker->userName,
		'is_admin' => 0,
		'is_active' => 0,
		// 'cpf' => rand(10000000000, 99999999999),
		'cpf' => $faker->cpf(false),
		'matricula' => rand(99999, 999999) . '-' . rand(1, 9) . chr(rand(65, 90)),
		// 'matricula' => $faker->rg(false) . '-' . chr(rand(65, 90)),
	];
});
