<?php

namespace App\Public\Controllers\Entries;

use App\Entries\Contracts\API\EntriesAPIContract;
use App\Entries\RequestDTOFactory\DeleteRequestDTOFactory;
use Illuminate\Http\Request;

class DeleteController
{
    public function delete(Request $request, EntriesAPIContract $entriesAPI)
    {
        $entriesAPI->delete(
            $request->route('id')
        );
    }
}
