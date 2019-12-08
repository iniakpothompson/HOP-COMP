<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Invoice
 *
 * @ORM\Table(name="invoice")
 * @ORM\Entity
 *  @ApiResource(
 *     normalizationContext={"groups"={"retreive"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 *  @ORM\Entity(repositoryClass="App\Repository\InvoiceRepository")
 */
class Invoice
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"insert"})
     */
    private $invoiceId;

    /**
     * @var string
     *
     * @ORM\Column(name="room_charge", type="decimal", precision=10, scale=0, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $roomCharge;

    /**
     * @var \Rooms
     *
     * @ORM\OneToOne(targetEntity="Rooms")
     *   @ORM\JoinColumn(name="Rooms_id", referencedColumnName="id")
     * @Groups({"insert","retrieve"})
     */
    private $rooms;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Hotels", inversedBy="invoice")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert","retrieve"})
     */
    private $hotel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoomCharge(): ?string
    {
        return $this->roomCharge;
    }

    public function setRoomCharge(string $roomCharge): self
    {
        $this->roomCharge = $roomCharge;

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

    public function getInvoiceId(): ?int
    {
        return $this->invoiceId;
    }


}
