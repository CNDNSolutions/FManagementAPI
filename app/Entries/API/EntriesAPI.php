<?php

namespace App\Entries\API;

use App\Entries\Contracts\API\EntriesAPIContract;
use App\Entries\Contracts\Services\DeleteServiceContract;
use App\Entries\Contracts\Services\IndexServiceContract;
use App\Entries\Contracts\Services\ShowServiceContract;
use App\Entries\Contracts\Services\StoreServiceContract;
use App\Entries\Contracts\Services\UpdateServiceContract;
use App\Entries\Models\Cost;
use App\Entries\Models\Entry;
use App\Entries\RequestDTO\DeleteRequestDTO;
use App\Entries\RequestDTO\IndexRequestDTO;
use App\Entries\RequestDTO\ShowRequestDTO;
use App\Entries\RequestDTO\StoreRequestDTO;
use App\Entries\RequestDTO\UpdateRequestDTO;
use App\Entries\RequestDTOFactory\DeleteRequestDTOFactory;
use App\Entries\RequestDTOFactory\IndexRequestDTOFactory;
use App\Entries\RequestDTOFactory\ShowRequestDTOFactory;
use App\Entries\RequestDTOFactory\StoreRequestDTOFactory;
use App\Entries\RequestDTOFactory\UpdateRequestDTOFactory;
use App\Entries\ResponseDTO\IndexResponseDTO;
use App\Entries\ResponseDTO\ShowResponseDTO;
use App\Entries\ResponseDTOFactory\IndexResponseDTOFactory;
use App\Entries\ResponseDTOFactory\ShowResponseDTOFactory;

class EntriesAPI implements EntriesAPIContract
{
    public function __construct(
        private StoreServiceContract $storeService,
        private IndexServiceContract $indexService,
        private ShowServiceContract $showService,
        private DeleteServiceContract $deleteService,
        private UpdateServiceContract $updateService
    )
    {
    }

    public function index(mixed $periodStart = null, mixed $periodEnd = null): IndexResponseDTO
    {
        $DTO = (new IndexRequestDTOFactory($periodStart, $periodEnd))->get();
        return (new IndexResponseDTOFactory($this->indexService->index($DTO)))->get();
    }

    public function show(mixed $id = null): ShowResponseDTO
    {
        $DTO = (new ShowRequestDTOFactory($id))->get();
        return (new ShowResponseDTOFactory($this->showService->show($DTO)))->get();
    }

    public function store(mixed $date = null, mixed $profit = null, mixed $markup = null, mixed $costs = null): void
    {
        $DTO = (new StoreRequestDTOFactory($date, $profit, $markup, $costs))->get();
        $this->storeService->store($DTO);
    }

    public function update(mixed $id = null, mixed $date = null, mixed $profit = null, mixed $markup = null, mixed $costs = null): void
    {
        $DTO = (new UpdateRequestDTOFactory($id, $date, $profit, $markup, $costs))->get();
        $this->updateService->update($DTO);
    }

    public function delete(mixed $id = null): void
    {
        $DTO = (new DeleteRequestDTOFactory($id))->get();
        $this->deleteService->delete($DTO->id);
    }
}
