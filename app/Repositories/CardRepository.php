<?php

namespace App\Repositories;

use App\Models\Card;

class CardRepository
{
    protected Card $card;

    public function __construct(Card $card)
    {
        $this->card = $card;
    }

}
