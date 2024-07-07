<?php

namespace App\Entries\RequestDTOFactory;

use App\Entries\RequestDTO\StoreRequestDTO;
use Carbon\Carbon;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class StoreRequestDTOFactory
{
    public function getDTO(string $date = null, int $profit = null, int $markup = null, string $costs = null): StoreRequestDTO
    {
        $date = $date ?: Carbon::now()->toDateTimeString();
        $profit = $profit ?: 0;
        $markup = $markup ?: 0;
        $costs = $costs ? json_decode($costs, true) : [];

        $this->validate([
            'date' => $date,
            'profit' => $profit,
            'markup' => $markup,
            'costs' => $costs
        ]);

        $date = Carbon::parse($date)->toDateTimeString();

        return new StoreRequestDTO($date, $profit, $markup, collect($costs));
    }

    private function validate(array $data)
    {
        $validation = Validator::make($data, [
            'date' => 'required|date',
            'profit' => 'required|integer|gte:0',
            'markup' => 'required|integer|gte:0',
            'costs' => 'array',
            'costs.*.amount' => 'required|integer|gte:0',
            'costs.*.description' => 'required|string',
        ]);

        if ($validation->fails())
        {
            throw new HttpResponseException(new JsonResponse($validation->messages(), 500));
        }
    }
}
