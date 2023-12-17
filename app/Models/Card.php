<?php

namespace App\Models;

use App\Traits\Encryptable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Card extends Model
{
    use HasFactory;
    use Encryptable;

    protected $fillable = [
        'card_number', 'pin', 'expiry_date', 'balance'
    ];
    protected $dates = [
        'activation_date', 'expiry_date'
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
}
