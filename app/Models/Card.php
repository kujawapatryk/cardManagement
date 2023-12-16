<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_number', 'pin', 'expiry_date', 'balance'
    ];
    protected $dates = [
        'activation_date', 'expiry_date'
    ];
}
