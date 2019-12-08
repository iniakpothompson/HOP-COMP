<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * Amenity
 *
 * @ORM\Table(name="amenity")
 * @ORM\Entity
 *  @ApiResource(
 *     itemOperations={"get","put"},
 *      collectionOperations={"get","post"},
 *     normalizationContext={
 *                                      "groups"={"insert"}
  *                                   },
 *              denormalizationContext={

 *                                          "groups"={"retrieve"}
 *
 *                                     }
 *
 * )
 * @ORM\Entity(repositoryClass="App\Repository\AmenityRepository")
 */

class Amenity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"insert"})
     *
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $name;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Hotels", inversedBy="amenity")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $hotel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
