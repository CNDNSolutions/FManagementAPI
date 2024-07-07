<?php

namespace App\Public\Controllers\Entries;

use App\Entries\Contracts\API\EntriesAPIContract;
use App\Entries\RequestDTOFactory\ShowRequestDTOFactory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ShowController
{
    public function show(Request $request, EntriesAPIContract $entriesAPI)
    {


        return new JsonResponse($entriesAPI->show(
            $request->route('id')
        )->entry);
    }
}
