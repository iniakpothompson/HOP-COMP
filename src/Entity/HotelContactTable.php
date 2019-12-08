<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * HotelContactTable
 *
 * @ORM\Table(name="hotel_contact_table")
 * @ORM\Entity
 *  @ApiResource(
 *     normalizationContext={"groups"={"retreive"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 * @ORM\Entity(repositoryClass="App\Repository\HotelContactTableRepository")
 */
class HotelContactTable
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
     * @ORM\Column(name="contact_person", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $contactPerson;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $position;

    /**
     * @var string
     *
     * @ORM\Column(name="website_address", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $websiteAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="email_address", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $emailAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="fax_number", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $faxNumber;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Hotels", inversedBy="hotelContactDetails")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $hotel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContactPerson(): ?string
    {
        return $this->contactPerson;
    }

    public function setContactPerson(string $contactPerson): self
    {
        $this->contactPerson = $contactPerson;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getWebsiteAddress(): ?string
    {
        return $this->websiteAddress;
    }

    public function setWebsiteAddress(string $websiteAddress): self
    {
        $this->websiteAddress = $websiteAddress;

        return $this;
    }

    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    public function setEmailAddress(string $emailAddress): self
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    public function getFaxNumber(): ?string
    {
        return $this->faxNumber;
    }

    public function setFaxNumber(string $faxNumber): self
    {
        $this->faxNumber = $faxNumber;

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
