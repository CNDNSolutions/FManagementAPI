<?php

namespace App\Entries\ResponseDTO;

use App\Entries\Collections\EntriesCollection;

class IndexResponseDTO
{
    public ?EntriesCollection $entries;

    public function __construct(?EntriesCollection $entries)
    {
        $this->entries = $entries;
    }
}
