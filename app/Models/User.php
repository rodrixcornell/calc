<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password', 'username', 'is_admin', 'is_active', 'cpf', 'matricula',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
		'created_at' => 'datetime:d/m/Y H:m:s',
		'updated_at' => 'datetime:d/m/Y H:m:s',
		'deleted_at' => 'datetime:d/m/Y H:m:s',
		'is_admin' => 'boolean',
		'is_active' => 'boolean',
	];

	public function organizations()
	{
		return $this->hasMany(Organization::class);
	}
}
