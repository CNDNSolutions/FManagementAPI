<?php

namespace App\Entries\RequestDTO;

class IndexRequestDTO
{
    public string $periodStart;

    public string $periodEnd;

    public function __construct(string $periodStart, string $periodEnd)
    {
        $this->periodStart = $periodStart;
        $this->periodEnd = $periodEnd;
    }
}
