<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'acronym', 'is_active', 'prodam_id', 'pmm_id', 'afim_id',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'created_at' => 'datetime:d/m/Y H:m:s',
		'updated_at' => 'datetime:d/m/Y H:m:s',
		'deleted_at' => 'datetime:d/m/Y H:m:s',
		'is_active' => 'boolean',
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
