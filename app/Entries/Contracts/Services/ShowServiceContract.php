<?php

namespace App\Entries\Contracts\Services;

use App\Entries\Collections\EntriesCollection;
use App\Entries\Models\Entry;
use App\Entries\RequestDTO\ShowRequestDTO;

interface ShowServiceContract
{
    public function show(ShowRequestDTO $DTO): ?Entry;
}
