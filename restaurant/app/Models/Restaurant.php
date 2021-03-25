<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'description',
		'address',
		'city',
	];

	/**
	 * Get the User that this Article is written by.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function county() {
		return $this->belongsTo(User::class);
	}
}
