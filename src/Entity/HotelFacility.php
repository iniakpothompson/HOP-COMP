<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * HotelFacility
 *
 * @ORM\Table(name="hotel_facility")
 * @ORM\Entity
 *  @ApiResource(
 *     normalizationContext={"groups"={"retreive"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 * @ORM\Entity(repositoryClass="App\Repository\HotelFacilityRepository")
 */
class HotelFacility
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
     * @ORM\Column(name="facility_name", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $facilityName;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Hotels", inversedBy="hotelFacility")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $hotel;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFacilityName(): ?string
    {
        return $this->facilityName;
    }

    public function setFacilityName(string $facilityName): self
    {
        $this->facilityName = $facilityName;

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
