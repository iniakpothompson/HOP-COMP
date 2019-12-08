<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * BookingDetails
 *
 * @ORM\Table(name="booking_details")
 * @ORM\Entity
 *  @ApiResource
 *     (
 *     normalizationContext={"groups"={"retreive"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 *
 * )
 * @ORM\Entity(repositoryClass="App\Repository\BookingDetailsRepository")
 */
class BookingDetails
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
     * @ORM\Column(name="status", type="string", length=45, nullable=false, options={"comment"="check_in or check_out. weither the person has"})
     * @Groups({"insert","retrieve"})
     */
    private $status;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date_booked", type="datetime", nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $dateBooked;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date_checked_out", type="datetime", nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $dateCheckedOut;

    /**
     * @var string
     *
     * @ORM\Column(name="from", type="string", length=45, nullable=false)
     * @Groups({"insert","retreive"})
     */
    private $from;

    /**
     * @var string
     *
     * @ORM\Column(name="to", type="string", length=45, nullable=false)
     * @Groups({"insert","retreive"})
     */
    private $to;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(name="checked_in_date", type="datetime", nullable=true)
     * @Groups({"insert","retreive"})
     */
    private $checkedInDate;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(name="checked_out_date", type="datetime", nullable=true)
     * @Groups({"insert","retreive"})
     */
    private $checkedOutDate;

    /**
     * @var string
     *
     * @ORM\Column(name="number_of_rooms", type="string", length=45, nullable=false)
     * @Groups({"insert","retreive"})
     */
    private $numberOfRooms;

    /**
     * @var string
     *
     * @ORM\Column(name="reference_number", type="string", length=45, nullable=false)
     * @Groups({"insert","retreive"})
     */
    private $referenceNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="confirm_booking", type="string", length=45, nullable=false)
     * @Groups({"insert","retreive"})
     */
    private $confirmBooking;

    /**
     * @var \GuestOrCustomer
     * @ORM\OneToOne(targetEntity="GuestOrCustomer")
     * @ORM\JoinColumn(name="Guest_or_customer_id", referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $guestOrCustomer;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Rooms", inversedBy="bookingDetails")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $room;



    /**
     * @ORM\OneToOne(targetEntity="App\Entity\CancelationTable", inversedBy="booking", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $cancelBooking;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getDateBooked(): ?\DateTimeInterface
    {
        return $this->dateBooked;
    }

    public function setDateBooked(\DateTimeInterface $dateBooked): self
    {
        $this->dateBooked = $dateBooked;

        return $this;
    }

    public function getDateCheckedOut(): ?\DateTimeInterface
    {
        return $this->dateCheckedOut;
    }

    public function setDateCheckedOut(\DateTimeInterface $dateCheckedOut): self
    {
        $this->dateCheckedOut = $dateCheckedOut;

        return $this;
    }

    public function getFrom(): ?string
    {
        return $this->from;
    }

    public function setFrom(string $from): self
    {
        $this->from = $from;

        return $this;
    }

    public function getTo(): ?string
    {
        return $this->to;
    }

    public function setTo(string $to): self
    {
        $this->to = $to;

        return $this;
    }

    public function getCheckedInDate(): ?\DateTimeInterface
    {
        return $this->checkedInDate;
    }

    public function setCheckedInDate(?\DateTimeInterface $checkedInDate): self
    {
        $this->checkedInDate = $checkedInDate;

        return $this;
    }

    public function getCheckedOutDate(): ?\DateTimeInterface
    {
        return $this->checkedOutDate;
    }

    public function setCheckedOutDate(?\DateTimeInterface $checkedOutDate): self
    {
        $this->checkedOutDate = $checkedOutDate;

        return $this;
    }

    public function getNumberOfRooms(): ?string
    {
        return $this->numberOfRooms;
    }

    public function setNumberOfRooms(string $numberOfRooms): self
    {
        $this->numberOfRooms = $numberOfRooms;

        return $this;
    }

    public function getReferenceNumber(): ?string
    {
        return $this->referenceNumber;
    }

    public function setReferenceNumber(string $referenceNumber): self
    {
        $this->referenceNumber = $referenceNumber;

        return $this;
    }

    public function getConfirmBooking(): ?string
    {
        return $this->confirmBooking;
    }

    public function setConfirmBooking(string $confirmBooking): self
    {
        $this->confirmBooking = $confirmBooking;

        return $this;
    }

    public function getGuestOrCustomer(): ?GuestOrCustomer
    {
        return $this->guestOrCustomer;
    }

    public function setGuestOrCustomer(?GuestOrCustomer $guestOrCustomer): self
    {
        $this->guestOrCustomer = $guestOrCustomer;

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

    public function getRoom(): ?Rooms
    {
        return $this->room;
    }

    public function setRoom(?Rooms $room): self
    {
        $this->room = $room;

        return $this;
    }



    public function getCancelBooking(): ?CancelationTable
    {
        return $this->cancelBooking;
    }

    public function setCancelBooking(?CancelationTable $cancelBooking): self
    {
        $this->cancelBooking = $cancelBooking;

        return $this;
    }


}
