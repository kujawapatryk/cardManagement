<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaginatedRequest;
use App\Http\Requests\StoreCardRequest;
use App\Models\Card;
use App\Repositories\CardRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CardController extends Controller
{
    protected CardRepository $cardRepository;

    public function __construct(CardRepository $cardRepository)
    {
        $this->cardRepository = $cardRepository;
    }
    public function index(PaginatedRequest $request): JsonResponse
    {
        try {
        $validatedData = $request->validated();
        $perPage = $validatedData['limit'] ?? config('app.pagination.per_page');
        $cards = $this->cardRepository->getAllPaginated($perPage);

        return response()->json($cards);

        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching data.'], 500);
        }
    }

    public function show(int $card): JsonResponse{
        try {
            $result = $this->cardRepository->getOne($card);
            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Card not found.'], 500);
        }
    }

    public function create(){
        //Currently, there is no need to send any data.
    }

    public function store(StoreCardRequest $request):JsonResponse{
        try {
            $validatedData = $request->validated();
            $result = $this->cardRepository->store($validatedData);
            return response()->json($result,201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Data addition has failed.'], 500);
        }

    }

    public function edit(Request $request){

    }

    public function update(StoreCardRequest $request, int $card){
        try {
            $validatedData = $request->validated();
            $result = $this->cardRepository->store($validatedData);
            return response()->json($result,201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Data addition has failed.'], 500);
        }
    }

    public function destroy(int $card): JsonResponse{
        try {
            $result = $this->cardRepository->destroy($card);
            if ($result) {
                return response()->json(['message' => 'Card successfully deleted.'], 200);
            } else {
                return response()->json(['error' => 'Data deletion has failed.'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Data deletion has failed.'], 500);
        }

    }


}
