<?php

namespace App\Controller;

use App\Mapper\SocialPostMapper;
use App\Repository\SocialPostRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SocialPostController extends AbstractController
{
    #[Route('/api/social-posts/published', name: 'api_social_posts', methods: ['GET'])]
    public function list(SocialPostRepository $repo, SocialPostMapper $mapper): JsonResponse
    {
        $posts = $repo->findPublished();
        $dtos = array_map(fn($post) => $mapper->entityToDto($post), $posts);

        return $this->json($dtos); 
    }

    /*
    #[Route('/api/social-posts/create', name: 'api_social_post_create', methods: ['POST'])]
    public function create(
        Request $request,
        SocialPostMapper $mapper,
        SocialPostRepository $repo
    ): JsonResponse {
        $data = json_decode($request->getContent(), true);

        $dto = new \App\Dto\SocialPostDto(
            null,
            $data['title'],
            $data['content'],
            (new \DateTimeImmutable())->format(\DateTime::ATOM)
        );
        $entity = $mapper->dtoToEntity($dto);

        $repo->save($entity, true);

        return $this->json($mapper->entityToDto($entity), Response::HTTP_CREATED);
    }
    */    
}