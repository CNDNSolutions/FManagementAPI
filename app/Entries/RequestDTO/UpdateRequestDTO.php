<?php

namespace App\Entries\RequestDTO;

class UpdateRequestDTO
{
    public string $date;

    public int $profit;

    public int $markup;

    public array $costs;

    public function __construct(string $date, int $profit, int $markup, array $costs)
    {
        $this->date = $date;
        $this->profit = $profit;
        $this->markup = $markup;
        $this->costs = $costs;
    }
}
