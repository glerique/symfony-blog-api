<?php

namespace App\Mapper;

use App\Entity\SocialPost;
use App\Dto\SocialPostDto;

class SocialPostMapper
{
    public function entityToDto(SocialPost $entity): SocialPostDto
    {
        return new SocialPostDto(
            $entity->getId(),
            $entity->getTitle() ?? '',
            $entity->getContent() ?? '',
            $entity->getCreatedAt()?->format(\DateTime::ATOM) ?? '',
            $entity->isPublished()
        );
    }

    public function dtoToEntity(SocialPostDto $dto, ?SocialPost $entity = null): SocialPost
    {
        $entity ??= new SocialPost();
        $entity->setTitle($dto->title);
        $entity->setContent($dto->content);
        $entity->setCreatedAt(new \DateTimeImmutable($dto->createdAt));
        if ($dto->isPublished !== null) {
            $entity->setIsPublished($dto->isPublished);
        }

        return $entity;
    }
}