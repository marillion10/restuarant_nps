<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
        	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
	];

	/**
	 * Get the User that this Category is written by.
	 *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
    public function restaurants() {
		return $this->belongsToMany(Restaurant::class);
	}
}