<?php

namespace App\Entries\Repository;

use App\Entries\Contracts\Repository\EntriesRepositoryContract;
use App\Entries\Models\Entry;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class EntriesRepository implements EntriesRepositoryContract
{
    public function save(string $date, int $profit, int $markup): Entry
    {
        $Entry = new Entry();

        $Entry->date = $date;
        $Entry->profit = $profit;
        $Entry->markup = $markup;

        $Entry->save();

        return $Entry;
    }

    public function getBetweenPeriod(string $periodStart, string $periodEnd): Collection
    {
        return Entry::whereBetween('date', [$periodStart, $periodEnd])->with('cost')->get();
    }
}
