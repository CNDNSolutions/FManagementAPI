<?php

namespace App\Entries\Contracts\Repository;

use App\Entries\Models\Cost;

interface CostsRepositoryContract
{
    public function save(int $entryId, int $amount, string $description, string $type, bool $isVariable): Cost;

    public function deleteByEntryId(int $entryId): void;
}
