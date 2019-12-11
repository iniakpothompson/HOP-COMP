<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * RoomTypes
 *
 * @ORM\Table(name="room_types")
 * @ORM\Entity
 *  @ApiResource(
 *     normalizationContext={"groups"={"retreive"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 *
 *  @ORM\Entity(repositoryClass="App\Repository\RoomTypesRepository")
 */
class RoomTypes
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"insert"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="r_type", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $rType;

    /**
     * @var string
     *
     * @ORM\Column(name="r_description", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $rDescription;

/**
     * @ORM\ManyToOne(targetEntity="App\Entity\Hotels", inversedBy="rooms")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert","retrieve"})
     */
    private $hotel;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Rooms", inversedBy="roomType")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $room;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RoomPrices", mappedBy="roomType")
     */
    private $roomPrices;

    public function __construct()
    {
        $this->roomPrices = new ArrayCollection();
		$this->rooms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRType(): ?string
    {
        return $this->rType;
    }

    public function setRType(string $rType): self
    {
        $this->rType = $rType;

        return $this;
    }

    public function getRDescription(): ?string
    {
        return $this->rDescription;
    }

    public function setRDescription(string $rDescription): self
    {
        $this->rDescription = $rDescription;

        return $this;
    }

 public function getHotel(): ?Hotels
    {
        return $this->hotel;
    }

    public function setHotel(?Hotels $hotel): self
    {
        $this->hotel = $hotel;

        return $this;
    }

    public function getRoom(): ?Rooms
    {
        return $this->room;
    }

    public function setRoom(?Rooms $room): self
    {
        $this->room = $room;

        return $this;
    }

    /**
     * @return Collection|RoomPrices[]
     */
    public function getRoomPrices(): Collection
    {
        return $this->roomPrices;
    }

    public function addRoomPrice(RoomPrices $roomPrice): self
    {
        if (!$this->roomPrices->contains($roomPrice)) {
            $this->roomPrices[] = $roomPrice;
            $roomPrice->setRoomType($this);
        }

        return $this;
    }

    public function removeRoomPrice(RoomPrices $roomPrice): self
    {
        if ($this->roomPrices->contains($roomPrice)) {
            $this->roomPrices->removeElement($roomPrice);
            // set the owning side to null (unless already changed)
            if ($roomPrice->getRoomType() === $this) {
                $roomPrice->setRoomType(null);
            }
        }

        return $this;
    }
/**
     * @return Collection|Rooms[]
     */
    public function getRooms(): Collection
    {
        return $this->rooms;
    }

    public function addRoom(Rooms $room): self
    {
        if (!$this->rooms->contains($room)) {
            $this->rooms[] = $room;
            $room->setRoomType($this);
        }

        return $this;
    }

    public function removeRoom(Rooms $room): self
    {
        if ($this->rooms->contains($room)) {
            $this->rooms->removeElement($room);
            // set the owning side to null (unless already changed)
            if ($room->getRoomType() === $this) {
                $room->setRoomType(null);
            }
        }

        return $this;
    }

}
