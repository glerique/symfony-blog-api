<?php

namespace App\Mapper;

use App\Dto\SocialPostDto;
use App\Entity\SocialPost;

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
        if (null !== $dto->isPublished) {
            $entity->setIsPublished($dto->isPublished);
        }

        return $entity;
    }
}
