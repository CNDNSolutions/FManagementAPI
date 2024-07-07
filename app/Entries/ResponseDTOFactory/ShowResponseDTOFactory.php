<?php

namespace App\Entries\ResponseDTOFactory;

use App\Entries\Models\Entry;
use App\Entries\ResponseDTO\ShowResponseDTO;

class ShowResponseDTOFactory
{
    private ShowResponseDTO $DTO;

    public function __construct(?Entry $entry = null)
    {
        $entry = $entry ?: new Entry();
        $this->DTO = new ShowResponseDTO($entry);
    }

    public function get(): ShowResponseDTO
    {
        return $this->DTO;
    }
}
