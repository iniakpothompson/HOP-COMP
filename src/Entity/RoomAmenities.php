<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\RoomAmenitiesRepository")
 */
class RoomAmenities
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $amenityName;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Rooms", inversedBy="amenities")
     */
    private $room;

    public function __construct()
    {
        $this->room = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmenityName(): ?string
    {
        return $this->amenityName;
    }

    public function setAmenityName(?string $amenityName): self
    {
        $this->amenityName = $amenityName;

        return $this;
    }

    /**
     * @return Collection|Rooms[]
     */
    public function getRoom(): Collection
    {
        return $this->room;
    }

    public function addRoom(Rooms $room): self
    {
        if (!$this->room->contains($room)) {
            $this->room[] = $room;
        }

        return $this;
    }

    public function removeRoom(Rooms $room): self
    {
        if ($this->room->contains($room)) {
            $this->room->removeElement($room);
        }

        return $this;
    }
}
