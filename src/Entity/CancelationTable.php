<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * CancelationTable
 *
 * @ORM\Table(name="cancelation_table")
 * @ORM\Entity
 *  @ApiResource(
 *     normalizationContext={"groups"={"retreive"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 * @ORM\Entity(repositoryClass="App\Repository\CancelationTableRepository")
 */
class CancelationTable
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
     * @ORM\Column(name="cancelation_number", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $cancelationNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="cancelation_status", type="string", length=45, nullable=false)
     * @Groups({"insert"})
     */
    private $cancelationStatus;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     * @Groups({"insert","retreive"})
     */
    private $date;

    /**
     * @var \BookingDetails
     *
     *
     * @ORM\OneToOne(targetEntity="BookingDetails")
     *   @ORM\JoinColumn(name="Booking_Details_id", referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $bookingDetails;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\BookingDetails", mappedBy="cancelBooking", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $booking;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCancelationNumber(): ?string
    {
        return $this->cancelationNumber;
    }

    public function setCancelationNumber(string $cancelationNumber): self
    {
        $this->cancelationNumber = $cancelationNumber;

        return $this;
    }

    public function getCancelationStatus(): ?string
    {
        return $this->cancelationStatus;
    }

    public function setCancelationStatus(string $cancelationStatus): self
    {
        $this->cancelationStatus = $cancelationStatus;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getBookingDetails(): ?BookingDetails
    {
        return $this->bookingDetails;
    }

    public function setBookingDetails(?BookingDetails $bookingDetails): self
    {
        $this->bookingDetails = $bookingDetails;

        return $this;
    }

    public function getBooking(): ?BookingDetails
    {
        return $this->booking;
    }

    public function setBooking(?BookingDetails $booking): self
    {
        $this->booking = $booking;

        // set (or unset) the owning side of the relation if necessary
        $newCancelBooking = $booking === null ? null : $this;
        if ($newCancelBooking !== $booking->getCancelBooking()) {
            $booking->setCancelBooking($newCancelBooking);
        }

        return $this;
    }


}
