<?php

namespace App\Entries\Services;

use App\Entries\Contracts\Repository\CostsRepositoryContract;
use App\Entries\Contracts\Repository\EntriesRepositoryContract;
use App\Entries\Contracts\Services\UpdateServiceContract;
use App\Entries\RequestDTO\UpdateRequestDTO;

class UpdateService implements UpdateServiceContract
{
    public function __construct(
        private EntriesRepositoryContract $entriesRepository,
        private CostsRepositoryContract $costsRepository
    )
    {
    }

    public function update(UpdateRequestDTO $DTO): void
    {
        $this->entriesRepository->updateById($DTO->id, $DTO->date, $DTO->profit, $DTO->markup);

        $this->costsRepository->deleteByEntryId($DTO->id);

        $DTO->costs->each(function (array $cost) use ($DTO)
        {
            $this->costsRepository->save($DTO->id, $cost['amount'], $cost['description']);
        });
    }
}
