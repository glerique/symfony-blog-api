<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity]
#[ORM\Table(name: 'users')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private string $email;

    /** @var array<string> */
    #[ORM\Column(type: 'json')]
    private array $roles = [];

    #[ORM\Column(type: 'string')]
    private string $password;

    /**
     * @var Collection<int, SocialPost>
     */
    #[ORM\OneToMany(targetEntity: SocialPost::class, mappedBy: 'author')]
    private Collection $socialPosts;

    public function __construct()
    {
        $this->socialPosts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return non-empty-string
     */
    public function getUserIdentifier(): string
    {
        assert('' !== $this->email, 'User email cannot be empty');

        return $this->email;
    }

    /**
     * @return array<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param array<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
    }

    /**
     * @return Collection<int, SocialPost>
     */
    public function getSocialPosts(): Collection
    {
        return $this->socialPosts;
    }

    public function addSocialPost(SocialPost $socialPost): static
    {
        if (!$this->socialPosts->contains($socialPost)) {
            $this->socialPosts->add($socialPost);
            $socialPost->setAuthor($this);
        }

        return $this;
    }

    public function removeSocialPost(SocialPost $socialPost): static
    {
        if ($this->socialPosts->removeElement($socialPost)) {
            // set the owning side to null (unless already changed)
            if ($socialPost->getAuthor() === $this) {
                $socialPost->setAuthor(null);
            }
        }

        return $this;
    }
}
