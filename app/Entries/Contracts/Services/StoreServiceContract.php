<?php

namespace App\Entries\Contracts\Services;

use App\Entries\RequestDTO\StoreRequestDTO;

interface StoreServiceContract
{
    public function store(StoreRequestDTO $DTO): void;
}
