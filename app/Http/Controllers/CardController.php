<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaginatedRequest;
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

    public function show(Request $request){

    }

    public function create(){

    }

    public function store(Request $request){

    }

    public function edit(Request $request){

    }

    public function update(Request $request){

    }

    public function destroy(Request $request){

    }


}
