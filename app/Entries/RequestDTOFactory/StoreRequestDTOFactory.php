<?php

namespace App\Entries\RequestDTOFactory;

use App\Entries\RequestDTO\StoreRequestDTO;
use Carbon\Carbon;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class StoreRequestDTOFactory
{
    private StoreRequestDTO $DTO;

    public function __construct(?string $date = null, ?int $profit = null, ?int $markup = null, ?array $costs = null)
    {
        $date = $date === null ? Carbon::now()->toDateTimeString() : $date;
        $profit = $profit === null ? 0 : $profit;
        $markup = $markup === null ? 0 : $markup;
        $costs = $costs === null ? [] : $costs;

        $this->validate([
            'date' => $date,
            'profit' => $profit,
            'markup' => $markup,
            'costs' => $costs
        ]);

        $date = Carbon::parse($date)->toDateTimeString();

        $this->DTO = new StoreRequestDTO($date, $profit, $markup, collect($costs));
    }

    public function get(): StoreRequestDTO
    {
        return $this->DTO;
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
            'costs.*.type' => 'required|string',
            'costs.*.isVariable' => 'required|boolean'
        ]);

        if ($validation->fails()) {
            throw new HttpResponseException(new JsonResponse($validation->messages(), 500));
        }
    }
}
