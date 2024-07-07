<?php

namespace App\Entries\API;

use App\Entries\Contracts\API\EntriesAPIContract;
use App\Entries\Contracts\Services\IndexServiceContract;
use App\Entries\Contracts\Services\StoreServiceContract;
use App\Entries\Models\Cost;
use App\Entries\Models\Entry;
use App\Entries\RequestDTO\DeleteRequestDTO;
use App\Entries\RequestDTO\IndexRequestDTO;
use App\Entries\RequestDTO\ShowRequestDTO;
use App\Entries\RequestDTO\StoreRequestDTO;
use App\Entries\RequestDTO\UpdateRequestDTO;
use App\Entries\ResponseDTO\IndexResponseDTO;
use App\Entries\ResponseDTO\ShowResponseDTO;
use App\Entries\ResponseDTOFactory\IndexResponseDTOFactory;

class EntriesAPI implements EntriesAPIContract
{
    public function __construct(
        private StoreServiceContract $storeService,
        private IndexServiceContract $indexService
    )
    {
    }

    public function index(IndexRequestDTO $DTO): IndexResponseDTO
    {
        return (new IndexResponseDTOFactory)->getDTO($this->indexService->index($DTO));
    }

    public function show(ShowRequestDTO $DTO): ShowResponseDTO
    {
        return new ShowResponseDTO;
    }

    public function store(StoreRequestDTO $DTO): void
    {
        $this->storeService->store($DTO);
    }

    public function update(UpdateRequestDTO $DTO): void
    {
    }

    public function delete(DeleteRequestDTO $DTO): void
    {
    }
}
