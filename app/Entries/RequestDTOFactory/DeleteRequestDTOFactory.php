<?php

namespace App\Entries\RequestDTOFactory;

use App\Entries\RequestDTO\DeleteRequestDTO;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class DeleteRequestDTOFactory
{
    private DeleteRequestDTO $DTO;



    public function __construct(?int $id = null)
    {
        $this->validate([
            'id' => $id
        ]);

        $this->DTO = new DeleteRequestDTO($id);
    }

    public function get(): DeleteRequestDTO
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
