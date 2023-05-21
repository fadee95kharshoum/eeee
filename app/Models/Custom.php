<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Custom extends Model
{
    use HasFactory;
    //type_id = custom, value = value of uploaded card, card = card in plain textm, tr_nb = Transection Number

    protected $fillable = ['card_id', 'type_id', 'user_id','value', 'link', 'price', 'email', 'path', 'transaction_number', 'status'];

    /**
     * Get the type that owns the Custom Where Is Always Custom Type
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * Get the user that owns the Custom Cards
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
