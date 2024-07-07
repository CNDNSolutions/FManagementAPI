<?php

namespace App\Entries\Contracts\Repository;

use App\Entries\Models\Entry;
use Illuminate\Support\Collection;

interface EntriesRepositoryContract
{
    public function save(string $date, int $profit, int $markup): Entry;

    public function getBetweenPeriod(string $periodStart, string $periodEnd): Collection;

    public function getById(int $id): ?Entry;

    public function deleteById(int $id): void;

    public function updateById(int $id, string $date, int $profit, int $markup): void;
}
