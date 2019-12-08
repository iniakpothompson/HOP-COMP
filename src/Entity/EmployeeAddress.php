<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * EmployeeAddress
 *
 * @ORM\Entity
 *  @ApiResource(
 *     normalizationContext={"groups"={"retreive"}},
 *     denormalizationContext={"groups"={"insert"}}
 *
 * )
 * @ORM\Entity(repositoryClass="App\Repository\EmployeeAddressRepository")
 */
class EmployeeAddress
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
     * @ORM\Column(name="address_type", type="string", length=45, nullable=false)
     * @Groups({"insert","retreive"})
     */
    private $addressType;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=45, nullable=false)
     * @Groups({"insert","retreive"})
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="lga", type="string", length=45, nullable=false)
     * @Groups({"insert"})
     */
    private $lga;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=45, nullable=false)
     * @Groups({"insert","retrieve"})
     */
    private $country;

    /**
     * @var \Employees
     * @ORM\ManyToOne(targetEntity="App\Entity\Employees",inversedBy="employeeAddress")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     * @Groups({"insert"})
     */
    private $employees;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddressType(): ?string
    {
        return $this->addressType;
    }

    public function setAddressType(string $addressType): self
    {
        $this->addressType = $addressType;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getLga(): ?string
    {
        return $this->lga;
    }

    public function setLga(string $lga): self
    {
        $this->lga = $lga;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getEmployees(): ?Employees
    {
        return $this->employees;
    }

    public function setEmployees(?Employees $employees): self
    {
        $this->employees = $employees;

        return $this;
    }


}
