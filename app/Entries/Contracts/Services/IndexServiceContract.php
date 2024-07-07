<?php

namespace App\Entries\Contracts\Services;

use App\Entries\Collections\EntriesCollection;
use App\Entries\RequestDTO\IndexRequestDTO;

interface IndexServiceContract
{
    public function index(IndexRequestDTO $DTO): EntriesCollection;
}
