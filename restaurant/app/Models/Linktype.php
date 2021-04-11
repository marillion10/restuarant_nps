<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Linktype extends Model
{
    	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 *
	 */
	/**
	 *
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */

    public function links() {
        return $this->hasMany(Link::class);
    }
}
