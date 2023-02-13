<?php

namespace App\Place\Infrastructure\Controller;

use App\Place\Application\CreatePlaceService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/places')]
class PlaceController extends AbstractController
{
    private CreatePlaceService $createPlaceService;
    public function __construct(
     CreatePlaceService $createPlaceService
    )
    {
        $this->createPlaceService = $createPlaceService;
    }

    #[Route('/create', methods: ['POST'])]
    public function addPlace(Request $request): JsonResponse
    {
        $name = $request->request->get('name');

        ($this->createPlaceService)($name);

        return new JsonResponse([
            null,
            Response::HTTP_CREATED
        ]);
    }
}