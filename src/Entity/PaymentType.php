<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * PaymentType
 *
 * @ORM\Table(name="payment_type")
 * @ORM\Entity
 *  @ApiResource(
 *     normalizationContext={"groups"={"retreive"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 *  @ORM\Entity(repositoryClass="App\Repository\PaymentTypeRepository")
 */
class PaymentType
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
     * @ORM\Column(name="card", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $card;

    /**
     * @var string
     *
     * @ORM\Column(name="cash", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $cash;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Hotels", mappedBy="paymentType")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert","retrieve"})
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

    public function getCard(): ?string
    {
        return $this->card;
    }

    public function setCard(string $card): self
    {
        $this->card = $card;

        return $this;
    }

    public function getCash(): ?string
    {
        return $this->cash;
    }

    public function setCash(string $cash): self
    {
        $this->cash = $cash;

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
            $hotel->addPaymentType($this);
        }

        return $this;
    }

    public function removeHotel(Hotels $hotel): self
    {
        if ($this->hotel->contains($hotel)) {
            $this->hotel->removeElement($hotel);
            $hotel->removePaymentType($this);
        }

        return $this;
    }


}
