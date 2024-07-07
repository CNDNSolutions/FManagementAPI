<?php

namespace App\Entries\ResponseDTOFactory;

use App\Entries\Collections\EntriesCollection;
use App\Entries\RequestDTO\IndexRequestDTO;
use App\Entries\ResponseDTO\IndexResponseDTO;
use Carbon\Carbon;

class IndexResponseDTOFactory
{
    private IndexResponseDTO $DTO;

    public function __construct(?EntriesCollection $entries = null)
    {
        $entries = $entries ?: new EntriesCollection();
        $this->DTO = new IndexResponseDTO($entries);
    }

    public function get(): IndexResponseDTO
    {
        return $this->DTO;
    }
}
