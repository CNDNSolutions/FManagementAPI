<?php

namespace App\Entries\Repository;

use App\Entries\Contracts\Repository\CostsRepositoryContract;
use App\Entries\Models\Cost;

class CostsRepository implements CostsRepositoryContract
{
    public function save(int $entryId, int $amount, string $description, string $type): Cost
    {
        $Cost = new Cost();

        $Cost->entryId = $entryId;
        $Cost->amount = $amount;
        $Cost->description = $description;
        $Cost->type = $type;

        $Cost->save();

        return $Cost;
    }

    public function deleteByEntryId(int $entryId): void
    {
        Cost::where('entryId', $entryId)->delete();
    }
}
