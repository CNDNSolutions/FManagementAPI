<?php

namespace App\Entries\Contracts\Services;

interface DeleteServiceContract
{
    public function delete(int $id): void;
}
