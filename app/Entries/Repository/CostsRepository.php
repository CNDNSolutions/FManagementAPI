<?php

namespace App\Entries\Repository;

use App\Entries\Contracts\Repository\CostsRepositoryContract;
use App\Entries\Models\Cost;

class CostsRepository implements CostsRepositoryContract
{
    public function save(int $entryId, int $amount, string $description): Cost
    {
        $Cost = new Cost();

        $Cost->entryId = $entryId;
        $Cost->amount = $amount;
        $Cost->description = $description;

        $Cost->save();

        return $Cost;
    }
}
