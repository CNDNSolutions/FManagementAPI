<?php

namespace App\Entries\Services;

use App\Entries\Contracts\Repository\EntriesRepositoryContract;
use App\Entries\Contracts\Services\DeleteServiceContract;

class DeleteService implements DeleteServiceContract
{
    public function __construct(private EntriesRepositoryContract $entriesRepository)
    {
    }

    public function delete(int $id): void
    {
        $this->entriesRepository->deleteById($id);
    }
}
