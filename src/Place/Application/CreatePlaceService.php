<?php

namespace App\Place\Application;

use App\Place\Domain\Place;
use App\Place\Domain\PlaceRepository;

class CreatePlaceService
{
    private PlaceRepository $repository;

    public function __construct(PlaceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $name): void
    {
        $id = $this->repository->generateId();
        $place = new Place($id, $name, true, new \DateTimeImmutable('now'));
        $this->repository->save($place);
    }
}