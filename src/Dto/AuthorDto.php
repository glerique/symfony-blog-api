<?php

namespace App\Dto;

class AuthorDto
{
    public ?int $id = null;
    public string $email;

    public function __construct(?int $id, string $email)
    {
        $this->id = $id;
        $this->email = $email;
    }
}
