<?php

namespace App\Entries\Contracts\API;

use App\Entries\RequestDTO\DeleteRequestDTO;
use App\Entries\RequestDTO\IndexRequestDTO;
use App\Entries\RequestDTO\ShowRequestDTO;
use App\Entries\RequestDTO\StoreRequestDTO;
use App\Entries\RequestDTO\UpdateRequestDTO;
use App\Entries\ResponseDTO\IndexResponseDTO;
use App\Entries\ResponseDTO\ShowResponseDTO;

interface EntriesAPIContract
{
    public function index(mixed $periodStart = null, mixed $periodEnd = null): IndexResponseDTO;

    public function show(mixed $id = null): ShowResponseDTO;

    public function store(mixed $date = null, mixed $profit = null, mixed $markup = null, mixed $costs = null): void;

    public function update(mixed $id = null, mixed $date = null, mixed $profit = null, mixed $markup = null, mixed $costs = null): void;

    public function delete(mixed $id = null): void;
}
