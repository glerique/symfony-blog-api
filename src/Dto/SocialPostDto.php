<?php

namespace App\Dto;

class SocialPostDto
{
    public ?int $id = null;
    public string $title;
    public string $content;
    public string $createdAt;
    public ?bool $isPublished = null; 

    public function __construct(?int $id, string $title, string $content, string $createdAt, ?bool $isPublished = null  )
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->createdAt = $createdAt;
        $this->isPublished = $isPublished;
    }
}