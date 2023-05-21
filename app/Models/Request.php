<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Request extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'method_id', 'money', 'country', 'place_for_delivery', 'phone', 'status'];

    /**
     * Get the request that owns the Request
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function method(): BelongsTo
    {
        return $this->belongsTo(Method::class);
    }

    /**
     * Get the user that owns the Request
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
