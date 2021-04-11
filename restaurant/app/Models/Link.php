<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
        	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'url',
		'desc',
		'linktype_id',
		'restaurant_id',
	];

	/**
	 *
	 *@return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
    public function admin() {
		return $this->belongsTo(User::class);
	}
    public function restaurant() {
        return $this->belongsTo(Restaurant::class);
    }
    public function linktype() {
        return $this->belongsTo(Linktype::class);
    }
}
