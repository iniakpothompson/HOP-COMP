<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * PaymentDetails
 *
 * @ORM\Table(name="payment_details")
 * @ORM\Entity
 *  @ApiResource(
 *     normalizationContext={"groups"={"retreive"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 *  @ORM\Entity(repositoryClass="App\Repository\PaymentDetailsRepository")
 */
class PaymentDetails
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
     * @ORM\Column(name="payment_description", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $paymentDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_amount", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $paymentAmount;

    /**
     * @var \GuestOrCustomer
     * @ORM\OneToOne(targetEntity="GuestOrCustomer")
     *   @ORM\JoinColumn(name="Guest_id", referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $guest;


    /**
     * @var \PaymentMethod

     * @ORM\OneToOne(targetEntity="PaymentMethod")
     *   @ORM\JoinColumn(name="payment_method_id", referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $paymentMethod;

    /**
     * @var \PaymentType
     * @ORM\OneToOne(targetEntity="PaymentType")
     *   @ORM\JoinColumn(name="payment_type_id", referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $paymentType;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Hotels", inversedBy="paymentDetails")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $hotel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPaymentDescription(): ?string
    {
        return $this->paymentDescription;
    }

    public function setPaymentDescription(string $paymentDescription): self
    {
        $this->paymentDescription = $paymentDescription;

        return $this;
    }

    public function getPaymentAmount(): ?string
    {
        return $this->paymentAmount;
    }

    public function setPaymentAmount(string $paymentAmount): self
    {
        $this->paymentAmount = $paymentAmount;

        return $this;
    }

    public function getGuest(): ?GuestOrCustomer
    {
        return $this->guest;
    }

    public function setGuest(?GuestOrCustomer $guest): self
    {
        $this->guest = $guest;

        return $this;
    }

   

    public function getPaymentMethod(): ?PaymentMethod
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(?PaymentMethod $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    public function getPaymentType(): ?PaymentType
    {
        return $this->paymentType;
    }

    public function setPaymentType(?PaymentType $paymentType): self
    {
        $this->paymentType = $paymentType;

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
