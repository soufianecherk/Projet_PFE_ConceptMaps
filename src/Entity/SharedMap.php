<?php

namespace App\Entity;

use App\Repository\SharedMapRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SharedMapRepository::class)]
class SharedMap
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $sender;

    #[ORM\Column(type: 'string', length: 255)]
    private $recieverEmail;

    #[ORM\Column(type: 'boolean')]
    private $ReadOnly;

    #[ORM\ManyToOne(targetEntity: Map::class, inversedBy: 'sharedMaps')]
    private $Map;

    #[ORM\Column(type: 'string', length: 255)]
    private $mapLabel;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSender(): ?string
    {
        return $this->sender;
    }

    public function setSender(string $sender): self
    {
        $this->sender = $sender;

        return $this;
    }

    public function getRecieverEmail(): ?string
    {
        return $this->recieverEmail;
    }

    public function setRecieverEmail(string $recieverEmail): self
    {
        $this->recieverEmail = $recieverEmail;

        return $this;
    }

    public function getReadOnly(): ?bool
    {
        return $this->ReadOnly;
    }

    public function setReadOnly(bool $ReadOnly): self
    {
        $this->ReadOnly = $ReadOnly;

        return $this;
    }

    public function getMap(): ?Map
    {
        return $this->Map;
    }

    public function setMap(?Map $Map): self
    {
        $this->Map = $Map;

        return $this;
    }

    public function getMapLabel(): ?string
    {
        return $this->mapLabel;
    }

    public function setMapLabel(string $mapLabel): self
    {
        $this->mapLabel = $mapLabel;

        return $this;
    }
}
