<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Card extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'path', 'status'];

    /**
     * Get all of the types for the Card
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function types(): HasMany
    {
        return $this->hasMany(Type::class);
    }
    /**
     * Get all of the uploads for the Card
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function uploads(): HasManyThrough
    {
        return $this->hasManyThrough(Upload::class, Type::class);
    }

    public function customs(): HasManyThrough
    {
        return $this->hasManyThrough(Custom::class, Type::class);
    }
}
