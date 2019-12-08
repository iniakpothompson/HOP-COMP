<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * HotelServices
 *
 * @ORM\Table(name="hotel_services")
 * @ORM\Entity
 *  @ApiResource(
 *     normalizationContext={"groups"={"retreive"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 *  @ORM\Entity(repositoryClass="App\Repository\HotelServicesRepository")
 *
 */
class HotelServices
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
     * @ORM\Column(name="hotel_services_name", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $hotelServicesName;



    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Hotels", inversedBy="hotelServices")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $hotel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHotelServicesName(): ?string
    {
        return $this->hotelServicesName;
    }

    public function setHotelServicesName(string $hotelServicesName): self
    {
        $this->hotelServicesName = $hotelServicesName;

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
