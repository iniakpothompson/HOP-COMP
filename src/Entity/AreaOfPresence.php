<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * AreaOfPresence
 *
 * @ORM\Table(name="area_of_presence")
 * @ORM\Entity
 *  @ApiResource(
 *
 *     )
 * @ORM\Entity(repositoryClass="App\Repository\AreaOfPresenceRepository")
 */
class AreaOfPresence
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
     * @ORM\Column(name="Base_level", type="string", length=45, nullable=false)
     * @Groups({"insert"})
     */
    private $baseLevel;

    /**
     * @var string
     *
     * @ORM\Column(name="Boost_level", type="string", length=45, nullable=false)
     * @Groups({"insert","retreive"})
     */
    private $boostLevel;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Hotels", mappedBy="levelOfPresence", orphanRemoval=true)
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $hotel;

    public function __construct()
    {
        $this->hotel = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBaseLevel(): ?string
    {
        return $this->baseLevel;
    }

    public function setBaseLevel(string $baseLevel): self
    {
        $this->baseLevel = $baseLevel;

        return $this;
    }

    public function getBoostLevel(): ?string
    {
        return $this->boostLevel;
    }

    public function setBoostLevel(string $boostLevel): self
    {
        $this->boostLevel = $boostLevel;

        return $this;
    }


    /**
     * @return Collection|Hotels[]
     */
    public function getHotel(): Collection
    {
        return $this->hotel;
    }

    public function addHotel(Hotels $hotel): self
    {
        if (!$this->hotel->contains($hotel)) {
            $this->hotel[] = $hotel;
            $hotel->setLevelOfPresence($this);
        }

        return $this;
    }

    public function removeHotel(Hotels $hotel): self
    {
        if ($this->hotel->contains($hotel)) {
            $this->hotel->removeElement($hotel);
            // set the owning side to null (unless already changed)
            if ($hotel->getLevelOfPresence() === $this) {
                $hotel->setLevelOfPresence(null);
            }
        }

        return $this;
    }


}
