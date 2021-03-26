<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class County extends Model
{
        	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name'
	];

	/**
	 * 
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function restaurants() {
		return $this->hasmany(Restaurant::class);
	}
}
