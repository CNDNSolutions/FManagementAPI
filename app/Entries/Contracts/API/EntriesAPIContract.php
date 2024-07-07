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
    public function index(IndexRequestDTO $DTO): IndexResponseDTO;

    public function show(ShowRequestDTO $DTO): ShowResponseDTO;

    public function store(StoreRequestDTO $DTO): void;

    public function update(UpdateRequestDTO $DTO): void;

    public function delete(DeleteRequestDTO $DTO): void;
}
