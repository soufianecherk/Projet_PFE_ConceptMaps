<?php

namespace App\Entity;

use App\Repository\MapsRepository;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MapsRepository::class)]
class Maps
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'text')]
    private $json;

    #[ORM\Column(type: 'datetime')]
    private $lastmodified;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'maps')]
    #[ORM\JoinColumn(nullable: false)]
    private $owner;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getJson(): ?string
    {
        return $this->json;
    }

    public function setJson(string $json): self
    {
        $this->json = $json;

        return $this;
    }

    public function getLastmodified(): ?\DateTimeInterface
    {
        return $this->lastmodified;
    }

    public function setLastmodified(\DateTimeInterface $lastmodified): self
    {
        $this->lastmodified = $lastmodified;

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }
}
