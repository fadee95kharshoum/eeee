<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status', 'daily_price', 'card_id', 'placeholder'];

    /**
     * Get the Card that owns the Type
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class);
    }

    /**
     * Get all of the uploads for the Type
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function uploads(): HasMany
    {
        return $this->hasMany(Upload::class);
    }

    /**
     * Get all of the customs Uploaded Cards for the Type
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customs(): HasMany
    {
        return $this->hasMany(Custom::class);
    }

}
