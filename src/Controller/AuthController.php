<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Attributes as OA;

class AuthController extends AbstractController
{
    #[Route('/api/login', name: 'api_login', methods: ['POST'])]
    #[OA\Post]
    #[OA\RequestBody(content: new OA\JsonContent(properties: [
        new OA\Property('email', type: 'string', example: 'user@example.com'),
        new OA\Property('password', type: 'string', example: 'password123')
    ]))]
    public function login(): JsonResponse
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the login key on your firewall.');
    }

    #[Route('/api/profile', name: 'api_profile', methods: ['GET'])]
    #[OA\Get(security: [['bearerAuth' => []]])]
    public function profile(): JsonResponse
    {
        /** @var \App\Entity\User|null $user */
        $user = $this->getUser();
        
        if (!$user) {
            return $this->json(['message' => 'User not found'], 404);
        }
        
        return $this->json([
            'user' => [
                'id' => $user->getId(),
                'email' => $user->getEmail(),
                'roles' => $user->getRoles()
            ]
        ]);
    }
}