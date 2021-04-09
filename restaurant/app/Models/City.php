<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class City extends Model
{
	use Sluggable;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'county_id',
		'slug',
	];

	/**
	 * Return the sluggable configuration array for this model.
	 *
	 * @return array
	 */
	public function sluggable(): array
	{
		return [
			'slug' => [
				'source' => 'name'
			]
		];
	}

	/**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
		return 'slug';
	}

	/**
	 * Get the User that this Article is written by.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function admin()
	{
		return $this->belongsTo(User::class);
	}

	public function restaurants()
	{
		return $this->hasMany(Restaurant::class);
	}

	public function county()
	{
		return $this->belongsTo(County::class);
	}
}
