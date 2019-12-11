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
     * @ORM\OneToMany(targetEntity="App\Entity\RoomTypes", mappedBy="room", orphanRemoval=true)
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $roomType;

 

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

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\RoomAmenities", mappedBy="room")
     */
    private $amenities;



    public function __construct()
    {
        $this->roomType = new ArrayCollection();
        $this->price = new ArrayCollection();
        $this->extraBed = new ArrayCollection();
        $this->bedInfo = new ArrayCollection();
        $this->bookingDetails = new ArrayCollection();
        $this->amenities = new ArrayCollection();
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

    /**
     * @return Collection|RoomAmenities[]
     */
    public function getAmenities(): Collection
    {
        return $this->amenities;
    }

    public function addAmenity(RoomAmenities $amenity): self
    {
        if (!$this->amenities->contains($amenity)) {
            $this->amenities[] = $amenity;
            $amenity->addRoom($this);
        }

        return $this;
    }

    public function removeAmenity(RoomAmenities $amenity): self
    {
        if ($this->amenities->contains($amenity)) {
            $this->amenities->removeElement($amenity);
            $amenity->removeRoom($this);
        }

        return $this;
    }




}
