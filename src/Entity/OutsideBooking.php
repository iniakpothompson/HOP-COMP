<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * OutsideBooking
 *
 * @ORM\Table(name="outside_booking")
 * @ORM\Entity
 *  @ApiResource(
 *     normalizationContext={"groups"={"retreive"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 *  @ORM\Entity(repositoryClass="App\Repository\OutsideBookingRepository")
 */
class OutsideBooking
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
     * @var DateTime
     *
     * @ORM\Column(name="date_from", type="datetime", nullable=false, options={"comment"="The date that the hotel start occupy"})
     * @Groups({"insert","retrieve"})
     */
    private $dateFrom;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date_to", type="datetime", nullable=false, options={"comment"="The date that the hotel start free/vacancy"})
     * @Groups({"insert","retrieve"})
     */
    private $dateTo;

    /**
     * @var \Hotels
     * @ORM\OneToOne(targetEntity="Hotels")
     *   @ORM\JoinColumn(name="Hotels_id", referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $hotels;

    /**
     * @var \Rooms

     * @ORM\OneToOne(targetEntity="Rooms")
     *   @ORM\JoinColumn(name="Rooms_id", referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $rooms;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Hotels", inversedBy="outBooking")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $hotel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateFrom(): ?\DateTimeInterface
    {
        return $this->dateFrom;
    }

    public function setDateFrom(\DateTimeInterface $dateFrom): self
    {
        $this->dateFrom = $dateFrom;

        return $this;
    }

    public function getDateTo(): ?\DateTimeInterface
    {
        return $this->dateTo;
    }

    public function setDateTo(\DateTimeInterface $dateTo): self
    {
        $this->dateTo = $dateTo;

        return $this;
    }

    public function getHotels(): ?Hotels
    {
        return $this->hotels;
    }

    public function setHotels(?Hotels $hotels): self
    {
        $this->hotels = $hotels;

        return $this;
    }

    public function getRooms(): ?Rooms
    {
        return $this->rooms;
    }

    public function setRooms(?Rooms $rooms): self
    {
        $this->rooms = $rooms;

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


}
