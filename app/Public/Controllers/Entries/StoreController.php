<?php

namespace App\Public\Controllers\Entries;

use App\Entries\Contracts\API\EntriesAPIContract;
use App\Entries\RequestDTOFactory\StoreRequestDTOFactory;
use Illuminate\Http\Request;

class StoreController
{
    public function store(Request $request, EntriesAPIContract $entriesAPI)
    {

        $entriesAPI->store(
            $request->json('date'),
            $request->json('profit'),
            $request->json('markup'),
            $request->json('costs')
        );
    }
}
