<?php

namespace App\Product\Domain;

use App\Place\Domain\Place;

final class Product
{

    public function __construct(
        private string  $id,
        private string  $name,
        private bool    $isActive,
        private Place   $place
    )
    {
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @return Place
     */
    public function getPlace(): Place
    {
        return $this->place;
    }
}