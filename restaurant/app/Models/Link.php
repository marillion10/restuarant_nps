<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
        	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
        'restaurant_id'
	];

	/**
	 *
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
}
