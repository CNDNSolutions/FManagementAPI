<?php

namespace App\Entries\Services;

use App\Entries\Contracts\Repository\CostsRepositoryContract;
use App\Entries\Contracts\Repository\EntriesRepositoryContract;
use App\Entries\Contracts\Services\StoreServiceContract;
use App\Entries\RequestDTO\StoreRequestDTO;

class StoreService implements StoreServiceContract
{
    public function __construct(
        private EntriesRepositoryContract $entriesRepository,
        private CostsRepositoryContract $costsRepository
    )
    {
    }

    public function store(StoreRequestDTO $DTO): void
    {
        $Entry = $this->entriesRepository->save($DTO->date, $DTO->profit, $DTO->markup);

        $DTO->costs->each(function (array $cost) use ($Entry)
        {
            $this->costsRepository->save($Entry->id, $cost['amount'], $cost['description']);
        });
    }
}
