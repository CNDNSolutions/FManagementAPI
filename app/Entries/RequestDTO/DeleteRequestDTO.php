<?php

namespace App\Entries\RequestDTO;

class DeleteRequestDTO
{
    public int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }
}
