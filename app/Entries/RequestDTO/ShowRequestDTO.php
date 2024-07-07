<?php

namespace App\Entries\RequestDTO;

class ShowRequestDTO
{
    public int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }
}
