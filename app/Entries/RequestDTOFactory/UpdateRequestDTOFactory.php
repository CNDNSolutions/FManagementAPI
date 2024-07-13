<?php

namespace App\Entries\RequestDTOFactory;

use App\Entries\RequestDTO\UpdateRequestDTO;
use Carbon\Carbon;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class UpdateRequestDTOFactory
{
    private UpdateRequestDTO $DTO;

    public function __construct(?int $id = null, ?string $date = null, ?int $profit = null, ?int $markup = null, ?array $costs = null)
    {

        $this->validate([
            'id' => $id,
            'date' => $date,
            'profit' => $profit,
            'markup' => $markup,
            'costs' => $costs
        ]);

        $date = $date === null ? Carbon::now()->toDateTimeString() : Carbon::parse($date)->toDateTimeString();
        $profit = $profit === null ? 0 : $profit;
        $markup = $markup === null ? 0 : $markup;
        $costs = $costs === null ? [] : $costs;

        $this->DTO = new UpdateRequestDTO($id, $date, $profit, $markup, collect($costs));
    }

    public function get(): UpdateRequestDTO
    {
        return $this->DTO;
    }

    private function validate(array $data)
    {
        $validation = Validator::make($data, [
            'id' => 'required|integer',
            'date' => 'date|nullable',
            'profit' => 'integer|gte:0|nullable',
            'markup' => 'integer|gte:0|nullable',
            'costs' => 'array|nullable',
            'costs.*' => 'required|array',
            'costs.*.amount' => 'required|integer|gte:0',
            'costs.*.description' => 'required|string',
            'costs.*.type' => 'required|string',
        ]);

        if ($validation->fails()) {
            throw new HttpResponseException(new JsonResponse($validation->messages(), 500));
        }
    }
}
