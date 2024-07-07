<?php

namespace App\Entries\RequestDTO;

use Illuminate\Support\Collection;

class UpdateRequestDTO
{
    public ?int $id;

    public ?string $date;

    public ?int $profit;

    public ?int $markup;

    public ?Collection $costs;

    public function __construct(int $id, string $date, int $profit, int $markup, Collection $costs)
    {
        $this->id = $id;
        $this->date = $date;
        $this->profit = $profit;
        $this->markup = $markup;
        $this->costs = $costs;
    }
}
