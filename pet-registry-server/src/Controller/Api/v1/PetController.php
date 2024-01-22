<?php

namespace App\Controller\Api\v1;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Request\PetCreationRequest;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;

class PetController extends AbstractController
{
    /**
     * @Route("/api/submit-pet-form", name="api_submit_pet_form", methods={"POST"})
     */
    public function create(#[MapRequestPayload] PetCreationRequest $request): JsonResponse
    {
        return new JsonResponse(['message' => 'Pet form submitted successfully'], Response::HTTP_CREATED);
    }
}
