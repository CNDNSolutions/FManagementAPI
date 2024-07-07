<?php

namespace App\Entries\Services;

use App\Entries\Collections\EntriesCollection;
use App\Entries\Contracts\Repository\EntriesRepositoryContract;
use App\Entries\Contracts\Services\ShowServiceContract;
use App\Entries\RequestDTO\ShowRequestDTO;
use App\Entries\Models\Entry;

class ShowService implements ShowServiceContract
{
    public function __construct(private EntriesRepositoryContract $entriesRepository)
    {
    }

    public function show(ShowRequestDTO $DTO): ?Entry
    {
        return $this->entriesRepository->getById($DTO->id);
    }
}
