<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Rooms
 *
 * @ORM\Table(name="rooms")
 * @ORM\Entity
 *  @ApiResource(
 *     normalizationContext={"groups"={"retreive"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 *  @ORM\Entity(repositoryClass="App\Repository\RoomsRepository")
 */
class Rooms
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
     * @ORM\Column(name="floor", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $floor;

    /**
     * @var string
     *
     * @ORM\Column(name="room_number", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $roomNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="room_description", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $roomDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="room_status", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $roomStatus;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Hotels", inversedBy="rooms")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert","retrieve"})
     */
    private $hotel;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RoomTypes", mappedBy="room", orphanRemoval=true)
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $roomType;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Price", mappedBy="room", orphanRemoval=true)
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert","retrieve"})
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ExtralBed", mappedBy="room")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert","retrieve"})
     */
    private $extraBed;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BedInfo", mappedBy="room", orphanRemoval=true)
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert","retrieve"})
     */
    private $bedInfo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BookingDetails", mappedBy="room", orphanRemoval=true)
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert","retrieve"})
     */
    private $bookingDetails;



    public function __construct()
    {
        $this->roomType = new ArrayCollection();
        $this->price = new ArrayCollection();
        $this->extraBed = new ArrayCollection();
        $this->bedInfo = new ArrayCollection();
        $this->bookingDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFloor(): ?string
    {
        return $this->floor;
    }

    public function setFloor(string $floor): self
    {
        $this->floor = $floor;

        return $this;
    }

    public function getRoomNumber(): ?string
    {
        return $this->roomNumber;
    }

    public function setRoomNumber(string $roomNumber): self
    {
        $this->roomNumber = $roomNumber;

        return $this;
    }

    public function getRoomDescription(): ?string
    {
        return $this->roomDescription;
    }

    public function setRoomDescription(string $roomDescription): self
    {
        $this->roomDescription = $roomDescription;

        return $this;
    }

    public function getRoomStatus(): ?string
    {
        return $this->roomStatus;
    }

    public function setRoomStatus(string $roomStatus): self
    {
        $this->roomStatus = $roomStatus;

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

    /**
     * @return Collection|RoomTypes[]
     */
    public function getRoomType(): Collection
    {
        return $this->roomType;
    }

    public function addRoomType(RoomTypes $roomType): self
    {
        if (!$this->roomType->contains($roomType)) {
            $this->roomType[] = $roomType;
            $roomType->setRoom($this);
        }

        return $this;
    }

    public function removeRoomType(RoomTypes $roomType): self
    {
        if ($this->roomType->contains($roomType)) {
            $this->roomType->removeElement($roomType);
            // set the owning side to null (unless already changed)
            if ($roomType->getRoom() === $this) {
                $roomType->setRoom(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Price[]
     */
    public function getPrice(): Collection
    {
        return $this->price;
    }

    public function addPrice(Price $price): self
    {
        if (!$this->price->contains($price)) {
            $this->price[] = $price;
            $price->setRoom($this);
        }

        return $this;
    }

    public function removePrice(Price $price): self
    {
        if ($this->price->contains($price)) {
            $this->price->removeElement($price);
            // set the owning side to null (unless already changed)
            if ($price->getRoom() === $this) {
                $price->setRoom(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ExtralBed[]
     */
    public function getExtraBed(): Collection
    {
        return $this->extraBed;
    }

    public function addExtraBed(ExtralBed $extraBed): self
    {
        if (!$this->extraBed->contains($extraBed)) {
            $this->extraBed[] = $extraBed;
            $extraBed->setRoom($this);
        }

        return $this;
    }

    public function removeExtraBed(ExtralBed $extraBed): self
    {
        if ($this->extraBed->contains($extraBed)) {
            $this->extraBed->removeElement($extraBed);
            // set the owning side to null (unless already changed)
            if ($extraBed->getRoom() === $this) {
                $extraBed->setRoom(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BedInfo[]
     */
    public function getBedInfo(): Collection
    {
        return $this->bedInfo;
    }

    public function addBedInfo(BedInfo $bedInfo): self
    {
        if (!$this->bedInfo->contains($bedInfo)) {
            $this->bedInfo[] = $bedInfo;
            $bedInfo->setRoom($this);
        }

        return $this;
    }

    public function removeBedInfo(BedInfo $bedInfo): self
    {
        if ($this->bedInfo->contains($bedInfo)) {
            $this->bedInfo->removeElement($bedInfo);
            // set the owning side to null (unless already changed)
            if ($bedInfo->getRoom() === $this) {
                $bedInfo->setRoom(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BookingDetails[]
     */
    public function getBookingDetails(): Collection
    {
        return $this->bookingDetails;
    }

    public function addBookingDetail(BookingDetails $bookingDetail): self
    {
        if (!$this->bookingDetails->contains($bookingDetail)) {
            $this->bookingDetails[] = $bookingDetail;
            $bookingDetail->setRoom($this);
        }

        return $this;
    }

    public function removeBookingDetail(BookingDetails $bookingDetail): self
    {
        if ($this->bookingDetails->contains($bookingDetail)) {
            $this->bookingDetails->removeElement($bookingDetail);
            // set the owning side to null (unless already changed)
            if ($bookingDetail->getRoom() === $this) {
                $bookingDetail->setRoom(null);
            }
        }

        return $this;
    }




}
