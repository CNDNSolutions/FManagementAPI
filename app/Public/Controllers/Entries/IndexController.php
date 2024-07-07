<?php

namespace App\Public\Controllers\Entries;

use App\Entries\Contracts\API\EntriesAPIContract;
use App\Entries\RequestDTOFactory\IndexRequestDTOFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IndexController
{
    public function index(Request $request, EntriesAPIContract $entriesAPI)
    {

        return new JsonResponse($entriesAPI->index(
            $request->query('periodStart'),
            $request->query('periodEnd'),
        )->entries->all());
    }
}
