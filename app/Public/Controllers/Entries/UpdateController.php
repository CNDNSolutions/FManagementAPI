<?php

namespace App\Public\Controllers\Entries;

use App\Entries\Contracts\API\EntriesAPIContract;
use App\Entries\Models\Entry;
use App\Entries\RequestDTOFactory\UpdateRequestDTOFactory;
use Illuminate\Http\Request;

class UpdateController
{
    public function update(Request $request, EntriesAPIContract $entriesAPI)
    {
        $entriesAPI->update(
            $request->route('id'),
            $request->json('date'),
            $request->json('profit'),
            $request->json('markup'),
            $request->json('costs')
        );
    }
}
