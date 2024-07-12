<?php

namespace App\Entries\RequestDTOFactory;

use App\Entries\RequestDTO\IndexRequestDTO;
use Carbon\Carbon;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class IndexRequestDTOFactory
{
    private IndexRequestDTO $DTO;

    public function __construct(?string $periodStart = null, ?string $periodEnd = null)
    {
        $periodStart = $periodStart === null ? Carbon::now()->startOfMonth()->toDateTimeString() : $periodStart;
        $periodEnd = $periodEnd === null ? Carbon::now()->toDateTimeString() : $periodEnd;

        $this->validate([
            'periodStart' => $periodStart,
            'periodEnd' => $periodEnd
        ]);

        $periodStart = Carbon::parse($periodStart)->toDateTimeString();
        $periodEnd = Carbon::parse($periodEnd)->toDateTimeString();

        $this->DTO = new IndexRequestDTO($periodStart, $periodEnd);
    }

    public function get(): IndexRequestDTO
    {
        return $this->DTO;
    }

    private function validate(array $data)
    {
        $validation = Validator::make($data, [
            'periodStart' => 'required|date',
            'periodEnd' => 'required|date'
        ]);

        if ($validation->fails()) {
            throw new HttpResponseException(new JsonResponse($validation->messages(), 400));
        }
    }
}
