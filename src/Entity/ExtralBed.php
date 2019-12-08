<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * ExtralBed
 *
 * @ORM\Table(name="extral_bed")
 * @ORM\Entity
 *  @ApiResource(
 *     normalizationContext={"groups"={"retreive"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 * @ORM\Entity(repositoryClass="App\Repository\ExtralBedRepository")
 */
class ExtralBed
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
     * @ORM\Column(name="bed_type", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $bedType;

    /**
     * @var string
     *
     * @ORM\Column(name="bed_number", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $bedNumber;

    /**
     * @var \GuestOrCustomer
     * @ORM\OneToOne(targetEntity="GuestOrCustomer")
     *   @ORM\JoinColumn(name="Guest_or_customer_id", referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $guestOrCustomer;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Rooms", inversedBy="extraBed")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $room;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBedType(): ?string
    {
        return $this->bedType;
    }

    public function setBedType(string $bedType): self
    {
        $this->bedType = $bedType;

        return $this;
    }

    public function getBedNumber(): ?string
    {
        return $this->bedNumber;
    }

    public function setBedNumber(string $bedNumber): self
    {
        $this->bedNumber = $bedNumber;

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

    public function getRoom(): ?Rooms
    {
        return $this->room;
    }

    public function setRoom(?Rooms $room): self
    {
        $this->room = $room;

        return $this;
    }




}
