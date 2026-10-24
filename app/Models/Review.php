<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function game()
    {
        return $this->belongsTo('App\Game');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
