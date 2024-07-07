<?php

namespace App\Entries\ResponseDTO;

use App\Entries\Models\Entry;

class ShowResponseDTO
{
    public Entry $entry;

    public function __construct(Entry $entry = new Entry())
    {
        $this->entry = $entry;
    }
}