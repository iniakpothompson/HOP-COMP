<?php

namespace App\Entity;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Rooms", inversedBy="roomType")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $room;

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
