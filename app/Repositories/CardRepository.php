<?php

namespace App\Repositories;

use App\Models\Card;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class CardRepository
{

    public function getAllPaginated(int $perPage): LengthAwarePaginator {
        $user = Auth::user();
        return $user->cards()->orderBy('id', 'desc')->paginate($perPage);
    }

    public function store(array $data): Card
    {
        $user = Auth::user();
        return $user->cards()->create($data);
    }

    public function destroy(int $cardId): bool {
        $card = $this->getOne($cardId);
        return $card->delete();
    }

    public function getOne(int $cardId): Card
    {
        $user = Auth::user();
        return $user->cards()->findOrFail($cardId);
    }

    public function update(array $data, int $cardId): Card {
        $card = $this->getOne($cardId);
        $card->update($data);
        return $card;
    }

}
