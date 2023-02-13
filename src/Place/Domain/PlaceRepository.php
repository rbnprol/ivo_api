<?php

namespace App\Place\Domain;

interface PlaceRepository
{
    public function generateId(): string;

    public function save(Place $place): void;
}