<?php

namespace App\Models;

use App\Http\Controllers\RestaurantController;
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