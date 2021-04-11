<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Linktype extends Model
{
	/**
	 *
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */

    public function links() {
        return $this->belongsTo(Link::class);
    }
}
