<?php

namespace App\Models;

use App\Traits\Encryptable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Card extends Model
{
    use HasFactory;
    use Encryptable;

    protected $fillable = [
        'card_number', 'pin', 'expiry_date', 'balance'
    ];

    protected $casts = [
        'activation_date' => 'datetime:Y-m-d H:i:s',
        'expiry_date' => 'datetime:Y-m-d'
    ];
    protected $hidden = ['created_at', 'updated_at'];

    protected array $encryptable = [
        'card_number', 'pin'
    ];

    public static function boot(): void
    {
        parent::boot();

        static::creating(function ($card) {
            $card->activation_date = $card->activation_date ?? Carbon::now();
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
