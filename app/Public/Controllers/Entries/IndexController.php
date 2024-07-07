<?php

namespace App\Public\Controllers\Entries;

use App\Entries\Contracts\API\EntriesAPIContract;
use App\Entries\Models\Cost;
use App\Entries\Models\Entry;
use App\Entries\RequestDTOFactory\IndexRequestDTOFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IndexController
{
    public function index(Request $request, EntriesAPIContract $entriesAPI)
    {
        $requestDTO = (new IndexRequestDTOFactory)->getDTO(
            $request->get('periodStart'),
            $request->get('periodEnd'),
        );
        return new JsonResponse($entriesAPI->index($requestDTO)->entries->all());
    }
}
