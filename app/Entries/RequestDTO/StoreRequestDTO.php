<?php

namespace App\Entries\RequestDTO;

use Illuminate\Support\Collection;

class StoreRequestDTO
{
    public string $date;

    public int $profit;

    public int $markup;

    public Collection $costs;

    public function __construct(string $date, int $profit, int $markup, Collection $costs)
    {
        $this->date = $date;
        $this->profit = $profit;
        $this->markup = $markup;
        $this->costs = $costs;
    }
}
