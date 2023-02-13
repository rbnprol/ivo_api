<?php

namespace App\Place\Infrastructure\Repository;

use App\Place\Domain\Place;
use App\Place\Domain\PlaceRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Uid\Uuid;

class DoctrinePlaceRepository extends ServiceEntityRepository implements PlaceRepository
{

    private EntityManagerInterface $entityManager;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $entityManager)
    {
        parent::__construct($registry, Place::class);
        $this->entityManager = $entityManager;
    }

    public function save(Place $place): void
    {
        $this->entityManager->persist($place);
        $this->entityManager->flush();
    }

    public function generateId(): string
    {
        return Uuid::v7()->toBase58();
    }
}