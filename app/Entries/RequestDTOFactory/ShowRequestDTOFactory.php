<?php

namespace App\Entries\RequestDTOFactory;

use App\Entries\RequestDTO\ShowRequestDTO;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class ShowRequestDTOFactory
{
    private ShowRequestDTO $DTO;
    public function __construct(?int $id = null)
    {
        $this->validate([
            'id' => $id
        ]);

        $this->DTO = new ShowRequestDTO($id);
    }

    public function get(): ShowRequestDTO
    {
        return $this->DTO;
    }

    private function validate(array $data)
    {
        $validation = Validator::make($data, [
            'id' => 'required'
        ]);

        if ($validation->fails())
        {
            throw new HttpResponseException(new JsonResponse($validation->messages(), 400));
        }
    }
}
