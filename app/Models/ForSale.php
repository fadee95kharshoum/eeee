<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ForSale extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'path', 'status'];

/**
 * Get all of the discounts for the ForSale
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function discounts(): HasMany
{
    return $this->hasMany(Discount::class);
}
}
