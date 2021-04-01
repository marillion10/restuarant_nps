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
        'county_id',
	];

	/**
	 * Get the User that this Article is written by.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function admin() {
		return $this->belongsTo(User::class);
	}

    public function restaurants() {
        return $this->hasMany(Restaurant::class);
    }

    public function county() {
		return $this->belongsTo(County::class);
	}

}
