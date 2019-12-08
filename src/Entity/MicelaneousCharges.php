<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * MicelaneousCharges
 *
 * @ORM\Table(name="micelaneous_charges")
 * @ORM\Entity
 *  @ApiResource(
 *     normalizationContext={"groups"={"retreive"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 *  @ORM\Entity(repositoryClass="App\Repository\MicelaneousChargesRepository")
 */
class MicelaneousCharges
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
     * @ORM\Column(name="description", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $amount;


    /**
     * @var \Rooms

     * @ORM\OneToOne(targetEntity="Rooms")
     *   @ORM\JoinColumn(name="Rooms_id", referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $rooms;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Hotels", inversedBy="miscCharges")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $hotel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): self
    {
        $this->amount = $amount;

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
