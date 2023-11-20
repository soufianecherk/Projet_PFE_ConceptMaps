<?php

namespace App\Entity;

use App\Repository\MapRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MapRepository::class)]
class Map
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
    private $last_modified;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'cards')]
    private $owner;

    #[ORM\Column(type: 'string', length: 255)]
    private $ownerLabel;

    #[ORM\OneToMany(mappedBy: 'Map', targetEntity: SharedMap::class)]
    private $sharedMaps;

    public function __construct()
    {
        $this->sharedMaps = new ArrayCollection();
    }


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

    public function getLastModified(): ?\DateTimeInterface
    {
        return $this->last_modified;
    }

    public function setLastModified(\DateTimeInterface $last_modified): self
    {
        $this->last_modified = $last_modified;

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

    public function getOwnerLabel(): ?string
    {
        return $this->ownerLabel;
    }

    public function setOwnerLabel(string $ownerLabel): self
    {
        $this->ownerLabel = $ownerLabel;

        return $this;
    }

    /**
     * @return Collection<int, SharedMap>
     */
    public function getSharedMaps(): Collection
    {
        return $this->sharedMaps;
    }

    public function addSharedMap(SharedMap $sharedMap): self
    {
        if (!$this->sharedMaps->contains($sharedMap)) {
            $this->sharedMaps[] = $sharedMap;
            $sharedMap->setMap($this);
        }

        return $this;
    }

    public function removeSharedMap(SharedMap $sharedMap): self
    {
        if ($this->sharedMaps->removeElement($sharedMap)) {
            // set the owning side to null (unless already changed)
            if ($sharedMap->getMap() === $this) {
                $sharedMap->setMap(null);
            }
        }

        return $this;
    }
}
