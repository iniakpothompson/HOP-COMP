<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * BedInfo
 *
 * @ORM\Table(name="bed_info")
 * @ORM\Entity
 *  @ApiResource(normalizationContext={
 *                                      "groups"={"insert"}
 *                                   },
 *              denormalizationContext={

 *                                          "groups"={"retrieve"}
 *
 *                                     }
 *     )
 * @ORM\Entity(repositoryClass="App\Repository\BedInfoRepository")
 */
class BedInfo
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
     * @ORM\Column(name="Bed_type", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $bedType;

    /**
     * @var string
     *
     * @ORM\Column(name="number_of_beds", type="string", length=45, nullable=false)
     * @Groups({"insert"})
     */
    private $numberOfBeds;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Rooms", inversedBy="bedInfo")
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

    public function getNumberOfBeds(): ?string
    {
        return $this->numberOfBeds;
    }

    public function setNumberOfBeds(string $numberOfBeds): self
    {
        $this->numberOfBeds = $numberOfBeds;

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
