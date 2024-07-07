<?php

namespace App\Entries\Services;

use App\Entries\Collections\EntriesCollection;
use App\Entries\Contracts\Repository\EntriesRepositoryContract;
use App\Entries\Contracts\Services\IndexServiceContract;
use App\Entries\RequestDTO\IndexRequestDTO;
use App\Entries\ResponseDTO\IndexResponseDTO;

class IndexService implements IndexServiceContract
{
    public function __construct(private EntriesRepositoryContract $entriesRepository)
    {
    }

    public function index(IndexRequestDTO $DTO): EntriesCollection
    {
        return new EntriesCollection($this->entriesRepository->getBetweenPeriod($DTO->periodStart, $DTO->periodEnd)->all());
    }
}
