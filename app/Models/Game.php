<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game extends Model
{
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the user that added the product.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }
}
