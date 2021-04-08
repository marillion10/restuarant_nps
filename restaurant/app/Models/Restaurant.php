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
		'address',
		'tel',
		'city_id',
        'description',
	];

	/**
	 * Get the User that this Article is written by.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function admin() {
		return $this->belongsTo(User::class);
	}

        public function city() {
        return $this->belongsTo(City::class);
    }

    public function tags() {
		return $this->belongsToMany(Tag::class);
	}

}
