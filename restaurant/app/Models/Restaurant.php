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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
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

    public function links() {
		return $this->hasMany(Link::class);
	}

	public static function boot() {
        parent::boot();

        static::deleting(function($user) { // before delete() method call this
             $user->links()->delete();
             // do the rest of the cleanup...
        });
    }
}
