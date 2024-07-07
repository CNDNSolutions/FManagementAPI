<?php

namespace App\Entries\ResponseDTOFactory;

use App\Entries\Collections\EntriesCollection;
use App\Entries\RequestDTO\IndexRequestDTO;
use App\Entries\ResponseDTO\IndexResponseDTO;
use Carbon\Carbon;

class IndexResponseDTOFactory
{
    public function getDTO(EntriesCollection $entries = null): IndexResponseDTO
    {
        $entries = $entries ?: new EntriesCollection();
        return new IndexResponseDTO($entries);
    }
}
