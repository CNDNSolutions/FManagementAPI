<?php

namespace App\Entries\Contracts\Services;

use App\Entries\RequestDTO\UpdateRequestDTO;

interface UpdateServiceContract
{
    public function update(UpdateRequestDTO $DTO): void;
}
