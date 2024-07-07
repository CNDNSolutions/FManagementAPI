<?php

namespace App\Public\Controllers\Entries;

use App\Entries\Contracts\API\EntriesAPIContract;
use App\Entries\RequestDTOFactory\StoreRequestDTOFactory;
use Illuminate\Http\Request;

class StoreController
{
    public function store(Request $request, EntriesAPIContract $entriesAPI)
    {
        $requestDTO = (new StoreRequestDTOFactory())->getDTO(
            $request->post('date'),
            $request->post('profit'),
            $request->post('markup'),
            $request->post('costs')
        );

        $entriesAPI->store($requestDTO);
    }
}
