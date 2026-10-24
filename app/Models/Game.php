<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    /**
     * Get the user that added the product.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
