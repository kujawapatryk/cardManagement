<?php

namespace App\Repositories;

use App\Models\Card;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CardRepository
{
    protected Card $card;

    public function __construct(Card $card)
    {
        $this->card = $card;
    }

    public function getAllPaginated(int $perPage): LengthAwarePaginator {
        return $this->card->paginate($perPage);
    }

    public function store(array $data): Card {
        return $this->card->create($data);
    }

    public function destroy(int $cardId): bool {
        return $this->card->destroy($cardId);
    }

}
