<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class City extends Model
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
	 * Get the User that this Article is written by.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function admin() {
		return $this->belongsTo(User::class);
	}

	public function Counties() {
        return $this->belongsTo(County::class);
    }

}
