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
    public function getDTO(string $periodStart = null, string $periodEnd = null): IndexRequestDTO
    {
        $periodStart = $periodStart ?: Carbon::now()->startOfMonth()->toDateTimeString();
        $periodEnd = $periodEnd ?: Carbon::now()->toDateTimeString();

        $this->validate([
            'periodStart' => $periodStart,
            'periodEnd' => $periodEnd
        ]);

        $periodStart = Carbon::parse($periodStart)->toDateTimeString();
        $periodEnd = Carbon::parse($periodEnd)->toDateTimeString();

        return new IndexRequestDTO($periodStart, $periodEnd);
    }

    private function validate(array $data)
    {
        $validation = Validator::make($data, [
            'periodStart' => 'required|date|before_or_equal:' . Carbon::now(),
            'periodEnd' => 'required|date|before_or_equal:' . Carbon::now()
        ]);

        if ($validation->fails())
        {
            throw new HttpResponseException(new JsonResponse($validation->messages(), 500));
        }
    }
}
